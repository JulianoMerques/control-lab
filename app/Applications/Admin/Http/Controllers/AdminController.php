<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Manutencao\Repositories\ManutencaoRepository;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use App\Domains\Pedido\Repositories\PedidoRepository;
use App\Domains\Salas\Repositories\SalaRepository;

class AdminController extends BaseController {

    private $salaRepository;
    private $pedidoRepository;
    private $manutencaoRepository;
    private $maquinaRepository;

    /**
     * AdminController constructor.
     * @param SalaRepository $salaRepository
     * @param PedidoRepository $pedidoRepository
     * @param ManutencaoRepository $manutencaoRepository
     * @param MaquinaRepository $maquinaRepository
     */
    public function __construct(SalaRepository $salaRepository, PedidoRepository $pedidoRepository,
                                ManutencaoRepository $manutencaoRepository,MaquinaRepository $maquinaRepository)
    {
        $this->middleware('auth');
        $this->salaRepository = $salaRepository;
        $this->pedidoRepository = $pedidoRepository;
        $this->manutencaoRepository = $manutencaoRepository;
        $this->maquinaRepository = $maquinaRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = count($this->maquinaRepository->all());
        $pedidos = count($this->pedidoRepository->all());
        $salas = count($this->salaRepository->all());
        $manutencoes = count($this->manutencaoRepository->all());

        return $this->view('home',compact('dispositivos','pedidos', 'salas','manutencoes'));
    }
}