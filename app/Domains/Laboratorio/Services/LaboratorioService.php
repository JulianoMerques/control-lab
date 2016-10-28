<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Maquina\Services;


use App\Domains\Maquina\Repositories\MaquinaRepository;

use App\Domains\Maquina\Validators\MaquinaValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LaboratorioService
{

    private $repository;

    private $validator;

//    private $laboratorioRepository;

    /**
     * MaquinaService constructor.
     * @param MaquinaRepository $repository
     * @param MaquinaValidator $validator
     * @param LaboratorioRepository $laboratorioRepository
     */
    public function __construct(MaquinaRepository $repository, MaquinaValidator $validator
//                                LaboratorioRepository $laboratorioRepository
    )
    {
        $this->repository = $repository;
        $this->validator = $validator;
//        $this->laboratorioRepository = $laboratorioRepository;

    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        try {
            $layout_id = (int) $data['layout_id'];

            //Verifica Extensão do Arquivo | Permitido .txt
            $extension = $data['arquivo']->getClientOriginalExtension();

            if($extension != 'txt'){
                $message = 'error|Formato de arquivo não permitido. Permitido Apenas .txt!';
                return Redirect::route('arquivos')->withMessage($message);
            }

            // Inserir dados no banco (Novo Arquivo)
            $data['cidade_id'] = 1;

            $createArquivo = $this->repository->create( $data );
            if( !$createArquivo ) {
                $message = 'error|Erro ao cadastrar Arquivo. Tente novamente.';
            }else{
                $pathArquivos = '/app/arquivos/dados';
                $file = $createArquivo->id.'.'.$extension;
                $upload = $data['arquivo']->move(public_path().$pathArquivos, $file);
                if(!$upload){
                    $message = 'error|Não foi possível fazer upload do arquivo de dados. Tente novamente!';
                    return Redirect::route('arquivos')->withMessage($message);
                }

                //Arquivo Load File
                $file1 = public_path().$pathArquivos.'/'.$file;

                //Arquivo Load File
                $lines = file($file1);

                //Atualizar banco de dados
                $update = $this->repository->update(['arquivo' => $pathArquivos.'/'.$file, 'total_linhas' => count($lines)], $createArquivo->id);
                if(!$update){
                    $message = 'error|Não foi atualizar o campo arquivo do arquivo de dados. Tente novamente!';
                    return Redirect::route('arquivos')->withMessage($message);
                }

                //Importar Dados do Arquivo
                return $this->importarDados($createArquivo->id, $layout_id);
            }
        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){

    }

    /**
     * @param $message String
     * @param $opts array
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnMessage($message, $opts, $status = 200){
        return response()->json([
            'message' => $message,
            'opts' => $opts
        ], $status);
    }


}