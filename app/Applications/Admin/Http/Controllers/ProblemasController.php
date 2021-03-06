<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Laboratorios\Services\LaboratorioService;

use App\Domains\Problema\Repositories\ProblemaRepository;
use App\Domains\Problema\Services\ProblemasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProblemasController extends BaseController {


    private $repository;

    private $service;

    public function __construct(ProblemaRepository $repository,ProblemasService $service)
    {
        $this->middleware('auth');
        $this->middleware('check.nivelAccess');
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    $problemas =$this->repository->paginate();
        return $this->view('Problemas.home', compact('problemas'));
    }
    public function store()
    {
        return $this->view('Problemas.add');
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
        $problema= $this->repository->find($id);
        return $this->view('Problemas.edit', compact('problema'));
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