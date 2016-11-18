<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Maquina\Services;


use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Maquina\Repositories\MaquinaRepository;

use App\Domains\Maquina\Validators\MaquinaValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class MaquinaService
{

    private $repository;

    private $validator;

    private $salaRepository;

    /**
     * MaquinaService constructor.
     * @param MaquinaRepository $repository
     * @param MaquinaValidator $validator
     * @param LaboratorioRepository $laboratorioRepository
     */
    public function __construct(MaquinaRepository $repository, MaquinaValidator $validator,
                                LaboratorioRepository $salaRepository
    )
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->salaRepository = $salaRepository;

    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
//        dd($data);
        try {
            $sala = $this->salaRepository->find($data['laboratorios_id']);
            if (count($sala) == $sala['capacidade']){
                $message = 'error|Sala com capacidade máxima. Tente outra sala';
                return Redirect::route('maquinas.add')->withMessage($message);
            }
//            Validação de dados
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );

            $createMaquina = $this->repository->create( $data );
            if( !$createMaquina ) {
                $message = 'error|Erro ao cadastrar Dispositivos. Tente novamente.';
            }else{
                $message = 'success|Dispositivos Cadastrada com Secesso.';
            }
            return Redirect::route('maquinas')->withMessage($message);

        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }
    public function show($id)
    {
        $maquina = $this->repository->find($id);
        return $this->view('Dispositivos.info', compact('maquina'));
    }

    public function update($data, $id){
//        dd($data);
        try{
            //            Validação de dados
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE );

            $updateMaquina = $this->repository->update( $data,$id);
            if( !$updateMaquina ) {
                $message = 'error|Erro ao Atualizar Dispositivos. Tente novamente.';
            }else{
                $message = 'success|Dispositivos Atualizada com Secesso.';
            }
            return Redirect::route('maquinas')->withMessage($message);


        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){

        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao excluir Dispositivo! Tente novamente!';
            return Redirect::route('maquinas')->withMessage($message);
        }
        $message = 'success|Dispositivo excluído com sucesso!';
        return Redirect::route('maquinas')->withMessage($message);

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