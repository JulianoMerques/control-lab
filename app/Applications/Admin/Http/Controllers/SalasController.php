<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Laboratorios\Services\LaboratorioService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SalasController extends BaseController {


    private $repository;

    private $service;

    public function __construct(LaboratorioRepository $repository, LaboratorioService $service)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    $salas =$this->repository->paginate(5);
        return $this->view('Salas.home', compact('salas'));
    }
    public function store()
    {
        return $this->view('Salas.add');
    }
    public function create(Request $request)
    {
        return $this->service->store($request->except('_token', 'enviar'));
    }
    public function show($id){
//        return $this->service->show($id);
        $sala = $this->repository->find($id);
        return $this->view('Salas.info', compact('sala'));
    }

    public function edit($id)
    {
        $sala = $this->repository->find($id);
        return $this->view('Salas.edit', compact('sala'));
    }

    public function update(Request $request, $id){
        return $this->service->update($request->except('_token', 'editar','id'),$id);

    }

    public function destroy($id){
        return $this->service->destroy($id);
    }


    public function getSalas(){
        $salas = $this->repository->all();
//
        return Response::json($salas);
    }

}