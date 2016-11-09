<?php
/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Pedido\Services;



use App\Domains\Pedido\Repositories\PedidoRepository;
use App\Domains\Pedido\Validators\PedidoValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Prettus\Validator\Contracts\ValidatorInterface;

class PedidoService
{

    private $repository;

    private $validator;

    /**
     * PedidoService constructor.
     * @param PedidoRepository $repository
     * @param PedidoValidator $validator
     */
    public function __construct(PedidoRepository $repository, PedidoValidator $validator)
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

        $data['usuario_id'] = Auth::user()->id;

//        dd($data);
        try {
            //            Validação de dados
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );

            $createPedido = $this->repository->create( $data );
            if( !$createPedido ) {
                $message = 'error|Erro ao cadastrar Pedido. Tente novamente.';
            }else{
                $message = 'success|Pedido Cadastrada com Secesso.';
            }

            return Redirect::route('pedidos')->withMessage($message);

        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }


    public function update($data, $id){
//        dd($data);
        $data['situacao'] = 2;
        try{
            //            Validação de dados
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE );

            $updateSala = $this->repository->update( $data,$id);
            if( !$updateSala ) {
                $message = 'error|Erro ao Atualizar Pedido. Tente novamente.';
            }else{
                $message = 'success|Pedido Atualizada com Secesso.';
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