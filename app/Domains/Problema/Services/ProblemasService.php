<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Problema\Services;


use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Laboratorios\Validators\LaboratorioValidator;
use App\Domains\Problema\Repositories\ProblemaRepository;
use App\Domains\Problema\Validators\ProblemaValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProblemasService
{

    private $repository;

    private $validator;

    /**
     * LaboratorioService constructor.
     * @param LaboratorioRepository $repository
     * @param LaboratorioValidator $validator
     */
    public function __construct(ProblemaRepository $repository, ProblemaValidator $validator)
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
                $message = 'error|Erro ao Cadastrar Problema. Tente novamente.';
            }else{
                $message = 'success|Problema Cadastrada com Secesso.';
            }

            return Redirect::route('problemas')->withMessage($message);

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
                $message = 'error|Erro ao Atualizar Problema. Tente novamente.';
            }else{
                $message = 'success|Problema Atualizado com Secesso.';
            }
            return Redirect::route('problemas')->withMessage($message);


        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao Deletar Problema. Tente novamente.';
        }else{
            $message = 'success|Problema Deletado com Secesso.';
        }
        return Redirect::route('problemas')->withMessage($message);

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