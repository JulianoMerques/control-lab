<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Laboratorios\Services;


use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Laboratorios\Validators\LaboratorioValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class LaboratorioService
{

    private $repository;

    private $validator;

    /**
     * LaboratorioService constructor.
     * @param LaboratorioRepository $repository
     * @param LaboratorioValidator $validator
     */
    public function __construct(LaboratorioRepository $repository, LaboratorioValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;

    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        try {
            //            Validação de dados
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );

            $createSala = $this->repository->create( $data );
            if( !$createSala ) {
                $message = 'error|Erro ao cadastrar Sala. Tente novamente.';
            }else{
                $message = 'success|Sala Cadastrada com Secesso.';
            }

            return Redirect::route('salas')->withMessage($message);

        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }


    public function update($data, $id){
//        dd($data);
        try{
            //            Validação de dados
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE );

            $updateSala = $this->repository->update( $data,$id);
            if( !$updateSala ) {
                $message = 'error|Erro ao Atualizar Sala. Tente novamente.';
            }else{
                $message = 'success|Sala Atualizada com Secesso.';
            }
            return Redirect::route('salas')->withMessage($message);


        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao Deletar Sala. Tente novamente.';
        }else{
            $message = 'success|Sala Deletada com Secesso.';
        }
        return Redirect::route('salas')->withMessage($message);

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