<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Maquina\Services\MaquinaService;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MaquinasController extends BaseController {

    private $repository;

    private $service;

    private $salasRepository;

    /**
     * MaquinasController constructor.
     * @param MaquinaRepository $repository
     * @param MaquinaService $service
     * @param LaboratorioRepository $salasRepository
     */
    public function __construct( MaquinaRepository $repository, MaquinaService $service,
                                 LaboratorioRepository $salasRepository)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
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
        $maquinas = $this->repository->paginate(4);
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
        $lab = $maquina->laboratorios['id'];
        $laboratorios = $this->salasRepository->all();
        return $this->view('Dispositivos.edit', compact('maquina','laboratorios'));
    }

    public function update(Request $request, $id){
        return $this->service->update($request->except('_token', 'editar','id'),$id);
    }

    public function teste()
    {
        $maquinas = $this->repository->all();
        return Response::json($maquinas);
    }

    public function getMaquinas($id)
    {
        $sala = $this->salasRepository->find($id);

        $maquinas = $sala->maquinas()->get(['id', 'nome']);
//        dd($maquinas);
        return Response::json($maquinas);
    }



    public function destroy($id){
        return $this->service->destroy($id);
    }
}