<?php
namespace App\Applications\Admin\Http\Controllers;


use App\Domains\TipoUser\Entities\Tipo;
use App\Domains\TipoUser\Services\TipoUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class tipoUserController extends BaseController {


    private $repository;

    private $service;

    public function __construct(Tipo $repository,TipoUserService $service)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    $tipos =$this->repository->paginate();
        return $this->view('TipoUser.home', compact('tipos'));
    }
    public function store()
    {
        return $this->view('TipoUser.add');
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
        return $this->view('TipoUser.edit', compact('tipo'));
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