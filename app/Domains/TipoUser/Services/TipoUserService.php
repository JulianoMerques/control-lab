<?php


namespace App\Domains\TipoUser\Services;


use App\Domains\Problema\Validators\ProblemaValidator;
use App\Domains\TipoUser\Repositories\TipoRepository;
use App\Domains\TipoUser\Validators\TipoUserValidator;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class TipoUserService
{

    private $repository;

    private $validator;

    /**
     * TipoUserService constructor.
     * @param TipoRepository $repository
     * @param ProblemaValidator $validator
     */
    public function __construct(TipoRepository $repository, TipoUserValidator $validator)
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
                $message = 'error|Erro ao Cadastrar Tipo de Usuário. Tente novamente.';
            }else{
                $message = 'success|Tipo de Usuário Cadastrado com Secesso.';
            }

            return Redirect::route('tipoUser')->withMessage($message);

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
                $message = 'error|Erro ao Atualizar Tipo de Usuário. Tente novamente.';
            }else{
                $message = 'success|Tipo de Usuário Atualizado com Secesso.';
            }
            return Redirect::route('tipoUser')->withMessage($message);


        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao Deletar Tipo de Usuário. Tente novamente.';
        }else{
            $message = 'success|Tipo de Usuário Deletado com Secesso.';
        }
        return Redirect::route('tipoUser')->withMessage($message);

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