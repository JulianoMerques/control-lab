<?php
namespace App\Applications\Admin\Http\Controllers;


use App\Domains\TipoManutencao\Repositories\TipoManutencaoRepository;
use App\Domains\TipoManutencao\Services\TipoManutencaoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class tipoManutencaoController extends BaseController {


    private $repository;

    private $service;

    public function __construct(TipoManutencaoRepository $repository,TipoManutencaoService $service)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    $tipos =$this->repository->paginate();
        return $this->view('TipoManutencao.home', compact('tipos'));
    }
    public function store()
    {
        return $this->view('TipoManutencao.add');
    }
    public function create(Request $request)
    {
        return $this->service->store($request->except('_token', 'enviar'));
    }
//    public function show($id){
////        return $this->service->show($id);
//        $sala = $this->repository->find($id);
//        return $this->view('Salas.info', compact('sala'));
//    }
//
    public function edit($id)
    {
        $tipo= $this->repository->find($id);
        return $this->view('TipoManutencao.edit', compact('tipo'));
    }
//
    public function update(Request $request, $id){
        return $this->service->update($request->except('_token', 'editar','id'),$id);

    }

    public function destroy($id){
        return $this->service->destroy($id);
    }


    public function getProblemas(){
        $problemas = $this->repository->all();
//
        return Response::json($problemas);
    }

}