<?php
namespace App\Applications\Admin\Http\Controllers;




use App\Domains\Manutencao\Repositories\ManutencaoRepository;
use App\Domains\Manutencao\Services\ManutencaoService;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use App\Domains\Pedido\Repositories\PedidoRepository;
use App\Domains\Pedido\Services\PedidoService;
use App\Domains\Problema\Repositories\ProblemaRepository;
use App\Domains\Salas\Repositories\SalaRepository;
use App\Domains\TipoManutencao\Repositories\TipoManutencaoRepository;
use App\Domains\TipoUser\Repositories\TipoRepository;
use App\Domains\Turno\Repositories\TurnoRepository;
use App\Domains\Usuario\Repositories\UsuarioRepository;
use App\Domains\Usuario\Service\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManutencaoController extends BaseController {

    /**
     * @var ManutencaoRepository
     */
    private $repository;
    /**
     * @var ManutencaoService
     */
    private $service;

    /**
     * @var TurnoRepository
     */
    private $turnoRepository;
    /**
     * @var PedidoRepository
     */
    private $pedidoRepository;

    public function __construct(ManutencaoRepository $repository,ManutencaoService $service,
                                TurnoRepository $turnoRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->service = $service;

        $this->turnoRepository = $turnoRepository;
    }

    public function index()
    {
            $manutencoes =$this->repository->all();
            return $this->view('Manutencao.home', compact('manutencoes'));
    }

    public function store($pedidos)
    {
        $turnos = $this->turnoRepository->all();
        return $this->view('Manutencao.add', compact('pedidos', 'turnos'));
    }

    public function create(Request $request)
    {
        return $this->service->store($request->except('_token', 'Salvar'));
    }

    public function show($id){
        $manutencao = $this->repository->find($id);
        return $this->view('Manutencao.info', compact('manutencao'));
    }

    public function edit($id)
    {
//        $this->repository->update( ['situacao' => '2'],$id);
//        $pedidos = $this->repository->find($id);
//        return $this->view('Pedidos.info', compact('pedidos'));
    }

    public function update(Request $request, $id)
    {
//        return $this->service->update($request->except('_token', 'editar','id'),$id);
    }

//    public function destroy($id){
//        return $this->service->destroy($id);
//    }
}