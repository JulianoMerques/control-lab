<?php


namespace App\Domains\TipoManutencao\Services;


use App\Domains\TipoManutencao\Repositories\TipoManutencaoRepository;
use App\Domains\TipoManutencao\Validators\TipoManutencaoValidator;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class TipoManutencaoService
{

    private $repository;

    private $validator;

    /**
     * TipoManutencaoService constructor.
     * @param TipoManutencaoRepository $repository
     * @param TipoManutencaoValidator $validator
     */
    public function __construct(TipoManutencaoRepository $repository, TipoManutencaoValidator $validator)
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
                $message = 'error|Erro ao Cadastrar Tipo de Manutenção. Tente novamente.';
            }else{
                $message = 'success|Tipo de Manutenção Cadastrado com Secesso.';
            }

            return Redirect::route('tipoManutencao')->withMessage($message);

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
                $message = 'error|Erro ao Atualizar Tipo de Manutenção. Tente novamente.';
            }else{
                $message = 'success|Tipo de Manutenção Atualizado com Secesso.';
            }
            return Redirect::route('tipoManutencao')->withMessage($message);


        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao Deletar Tipo de Manutenção. Tente novamente.';
        }else{
            $message = 'success|Tipo de Manutenção Deletado com Secesso.';
        }
        return Redirect::route('tipoManutencao')->withMessage($message);

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