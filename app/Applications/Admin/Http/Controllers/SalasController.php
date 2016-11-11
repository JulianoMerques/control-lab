<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Salas\Repositories\SalaRepository;
use App\Domains\Salas\Services\SalaService;
use Illuminate\Http\Request;

class SalasController extends BaseController {


    private $repository;

    private $service;

    public function __construct(SalaRepository $repository, SalaService $service)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    $salas =$this->repository->all();
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
}