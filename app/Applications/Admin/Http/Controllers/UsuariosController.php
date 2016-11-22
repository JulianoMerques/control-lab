<?php
namespace App\Applications\Admin\Http\Controllers;




use App\Domains\TipoUser\Repositories\TipoRepository;
use App\Domains\Turno\Repositories\TurnoRepository;
use App\Domains\Usuario\Repositories\UsuarioRepository;
use App\Domains\Usuario\Service\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UsuariosController extends BaseController {


    private $repository;

    private $service;

    private $turnoRepository;
    private $tipoRepository;

    public function __construct(UsuarioRepository $repository, UsuarioService $service,
                                TurnoRepository $turnoRepository, TipoRepository $tipoRepository)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
        $this->turnoRepository = $turnoRepository;
        $this->tipoRepository = $tipoRepository;
    }

    public function index()
    {
        $usuarios =$this->repository->paginate(5);
        return $this->view('Usuarios.home', compact('usuarios'));
    }
    public function store()
    {
        $turnos = $this->turnoRepository->all();
        $tipos = $this->tipoRepository->all();
        return $this->view('Usuarios.add', compact('turnos','tipos'));
    }
    public function create(Request $request)
    {
        return $this->service->store($request->except('_token', 'enviar'));
    }
    public function show($id){
        $usuario = $this->repository->find($id);
        return $this->view('Usuarios.info', compact('usuario'));
    }

    public function edit($id)
    {
        $turnos = $this->turnoRepository->all();
        $usuario = $this->repository->find($id);
        return $this->view('Usuarios.edit', compact('usuario','turnos'));
    }

    public function update(Request $request, $id){
        return $this->service->update($request->except('_token', 'editar','id'),$id);

    }
    public function getUsuarios()
    {
        $usuarios = $this->repository->all();
//
        return Response::json($usuarios);
    }

    public function destroy($id){
        return $this->service->destroy($id);
    }
}