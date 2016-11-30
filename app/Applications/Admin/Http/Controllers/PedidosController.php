<?php
namespace App\Applications\Admin\Http\Controllers;




use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use App\Domains\Pedido\Entities\Pedido;
use App\Domains\Pedido\Repositories\PedidoRepository;
use App\Domains\Pedido\Services\PedidoService;
use App\Domains\Problema\Repositories\ProblemaRepository;
use App\Domains\TipoManutencao\Repositories\TipoManutencaoRepository;
use App\Domains\TipoUser\Repositories\TipoRepository;
use App\Domains\Turno\Repositories\TurnoRepository;
use App\Domains\Usuario\Repositories\UsuarioRepository;
use App\Domains\Usuario\Service\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PedidosController extends BaseController {

    /**
     * @var PedidoReposytory
     */
    private $repository;
    /**
     * @var PedidoService
     */
    private $service;
    /**
     * @var TurnoRepository
     */
    private $turnoRepository;
    /**
     * @var TipoManutencaoRepository
     */
    private $tipoRepository;
    private $usuarioRepository;
    private $salaRepository;
    private $maquinaRepository;
    private $problemaRepository;

    public function __construct(UsuarioRepository $usuarioRepository, PedidoRepository $repository, PedidoService $service,
                                TipoManutencaoRepository $tipoRepository, LaboratorioRepository $salaRepository,
                                MaquinaRepository $maquinaRepository, ProblemaRepository $problemaRepository)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
        $this->tipoRepository = $tipoRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->salaRepository = $salaRepository;
        $this->maquinaRepository = $maquinaRepository;
        $this->problemaRepository = $problemaRepository;
    }

    public function index()
    {
        $usuario = Auth::user();
        if (!$usuario->isAdm() ){
            if (!$usuario->isEstag()){
//            $pedidos =$this->repository->skipPresenter()->findWhere(['usuario_id'=> Auth::user()->id])->paginate(5);
                $pedidos = Pedido::where(['usuario_id'=> Auth::user()->id])->paginate(5);
                return $this->view('Pedidos.home', compact('pedidos'));
            }

        }

        $pedidos =$this->repository->paginate(5);
        return $this->view('Pedidos.home', compact('pedidos'));


    }

    public function store()
    {
        $tipos = $this->tipoRepository->all();
        $maquinas = $this->maquinaRepository->all();
        $salas = $this->salaRepository->all();
        $problemas = $this->problemaRepository->all();
        return $this->view('Pedidos.add', compact('tipos','maquinas','salas','problemas'));
    }

    public function create(Request $request)
    {
        return $this->service->store($request->except('_token', 'Salvar'));
    }

    public function show($protocolo){
        $situacao = $this->repository->find($protocolo);
        if (Auth::user()->isAdm()){
            if ($situacao['situacao'] === 0){
                $this->repository->update( ['situacao' => '1'],$protocolo);
            }
        }


        $pedidos = $this->repository->find($protocolo);
//        $pedido = $this->repository->findWhere(['id'=>$protocolo, 'usuario_id'=> Auth::user()->id]);
//        dd($pedido);
        if (count($pedidos)>0){
            return $this->view('Pedidos.info', compact('pedidos'));
        }
        $message = 'error|Voce não tem acesso a este pedido.';
        return Redirect::route('pedidos')->withMessage($message);


    }

    public function edit($id)
    {
        $this->repository->update( ['situacao' => '2'],$id);
        $pedidos = $this->repository->find($id);
        return $this->view('Pedidos.info', compact('pedidos'));
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->except('_token', 'editar','id'),$id);
    }

//    public function destroy($id){
//        return $this->service->destroy($id);
//    }
}