<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Manutencao\Services;


use App\Domains\Manutencao\Repositories\ManutencaoRepository;
use App\Domains\Manutencao\Validators\ManutencaoValidator;
use App\Domains\Maquina\Repositories\MaquinaRepository;

use App\Domains\Pedido\Repositories\PedidoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class ManutencaoService
{

    private $repository;

    private $validator;

    private $pedidoRepository;

    /**
     * ManutencaoService constructor.
     * @param ManutencaoRepository $repository
     * @param ManutencaoValidator $validator
     */
    public function __construct(ManutencaoRepository $repository, ManutencaoValidator $validator,PedidoRepository $pedidoRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->pedidoRepository = $pedidoRepository;

    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        $data['usuario_id'] = Auth::user()->id;
        try {
//            Validação de dados
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );

            $createMaquina = $this->repository->create( $data );
            if( !$createMaquina ) {
                $message = 'error|Erro ao Cadastrar Manutenção. Tente novamente.';
            }else{
                $this->pedidoRepository->update(['situacao' => '2'],$data['pedido_id']);
                $message = 'success|Manutenção Cadastrada com Secesso.';
            }
            return Redirect::route('pedidos')->withMessage($message);

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