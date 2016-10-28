<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Salas\Repositories\SalaRepository;
use App\Domains\Maquina\Services\MaquinaService;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use Illuminate\Http\Request;

class MaquinasController extends BaseController {

    private $repository;

    private $service;

    private $salasRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( MaquinaRepository $repository, MaquinaService $service,
                                SalaRepository $salasRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->service = $service;
        $this->salasRepository = $salasRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinas = $this->repository->all();
        return $this->view('Dispositivos.home', compact('maquinas'));
    }

    public function store()
    {
    $laboratorios = $this->salasRepository->all();
        return $this->view('Dispositivos.add', compact('laboratorios'));
    }
    public function create(Request $request){
        return $this->service->store($request->except('_token', 'enviar'));
    }
    public function show($id){
//        return $this->service->show($id);
        $maquina = $this->repository->find($id);
        return $this->view('Dispositivos.info', compact('maquina'));
    }

    public function edit($id){
        $maquina = $this->repository->find($id);
        $laboratorios = $this->salasRepository->all();
        return $this->view('Dispositivos.edit', compact('maquina','laboratorios'));
    }

    public function update(Request $request, $id){
        return $this->service->update($request->except('_token', 'editar','id'),$id);

    }

    public function destroy($id){
//        dd($id);

        return $this->service->destroy($id);
    }
}