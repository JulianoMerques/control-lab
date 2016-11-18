<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Domains\Laboratorios\Repositories\LaboratorioRepository;
use App\Domains\Laboratorios\Services\LaboratorioService;

use App\Domains\Manutencao\Repositories\ManutencaoRepository;
use App\Domains\Maquina\Repositories\MaquinaRepository;
use App\Domains\Pedido\Repositories\PedidoRepository;
use App\Domains\Problema\Repositories\ProblemaRepository;
use App\Domains\TipoManutencao\Entities\TipoManutencao;
use App\Domains\Usuario\Repositories\UsuarioRepository;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Knp\Snappy\Pdf;

class RelatoriosController extends BaseController {


    private $repository;

    private $maquinaRepository;
    private $usuarioRepository;
    private $manutencaoRepository;
    private $pedidoRepository;
    private $tipoManutencao;
    private $problemaRepository;

    public function __construct(LaboratorioRepository $repository,MaquinaRepository $maquinaRepository,
                                UsuarioRepository $usuarioRepository,ManutencaoRepository $manutencaoRepository,
                                PedidoRepository $pedidoRepository, TipoManutencao $tipoManutencao,
                                ProblemaRepository $problemaRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->maquinaRepository = $maquinaRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->manutencaoRepository = $manutencaoRepository;
        $this->pedidoRepository = $pedidoRepository;
        $this->tipoManutencao = $tipoManutencao;
        $this->problemaRepository = $problemaRepository;
    }
    /*-------------------------------Relatório Dispositivos------------------------------------------------------------*/

    public function indexDispositivos()
    {
        $laboratorios =$this->repository->all();
        return $this->view('Relatorios.dispositivos', compact('laboratorios'));
    }

    public function relDipositivos(Request $request)
    {
        $id = $request['laboratorios_id'];
        if ($id == 0){
            $maquinas  = $this->maquinaRepository->all();
            $pdf = SnappyPdf::loadView('pdf.dispositivos', compact('maquinas'));
//            $pdf = SnappyPdf::loadView('pdf.dispositivos', compact('maquinas'))->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0);
            return $pdf->stream();
//            $name = 'Relatório de dispositivos Completo -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
        }else{

            $sala = $this->repository->find($id);
            $maquinas = $sala->maquinas()->get();
//            $maquinas  = $this->maquinaRepository->all();
            $pdf = SnappyPdf::loadView('pdf.dispositivos', compact('maquinas'));
//            $name = 'Relatório de dispositivos por sala -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
            return $pdf->stream();
        }
    }
    /*---------------------------Fim Relatório Dispositivos------------------------------------------------------------*/
//

    /*---------------------------Relatório Salas------------------------------------------------------------*/
    public function relSalas()
    {
        $salas = $this->repository->all();
        $pdf = SnappyPdf::loadView('pdf.salas', compact('salas'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
        return $pdf->stream();
    }
    /*---------------------------Fim Relatório Salas-----------------------------------------------------------*/


    /*---------------------------Relatório Salas------------------------------------------------------------*/
    public function relUsuarios()
    {
        $usuarios= $this->usuarioRepository->all();
        $pdf = SnappyPdf::loadView('pdf.usuarios', compact('usuarios'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
        return $pdf->stream();
    }
    /*---------------------------Fim Relatório Salas-----------------------------------------------------------*/

    /*---------------------------Relatório Manutenções------------------------------------------------------------*/

//    public function indexManutencoes()
//    {
//        $laboratorios =$this->repository->all();
//        return $this->view('Relatorios.dispositivos', compact('laboratorios'));
//    }
    public function relManutencao()
    {
        $manutencoes= $this->manutencaoRepository->all();
        $pdf = SnappyPdf::loadView('pdf.manutencao', compact('manutencoes'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
        return $pdf->stream();
    }
    /*---------------------------Fim Relatório Manutenções-----------------------------------------------------------*/




    /*---------------------------Relatório Pedidos------------------------------------------------------------*/

    public function indexPedidos()
    {
        return $this->view('Relatorios.pedidos');
    }


    public function relPedidos(Request $request)
    {
//        ------------------------ relatorio completo --------------------
        if ($request['tipo'] == 0) {
            $pedidos = $this->pedidoRepository->all();
            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
            return $pdf->stream();
        }

        //        --------------------fim relatorio completo --------------------

        //        ------------------------ relatorio por usuario --------------------
        if ($request['tipo'] == 1) {
            $usuario = $request['select'];

            $user = $this->usuarioRepository->find($usuario);
            $pedidos = $user->pedido()->get();

//            dd($pedidos);
            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
            return $pdf->stream();
        }
        //        --------------------fim relatorio por usuario --------------------

        //        ------------------------ relatorio por maquina --------------------
        if ($request['tipo'] == 2) {
//            $maquinas = $this->maquinaRepository->find($request['select']);
//            $pedidos = $maquinas->pedido()->get();
            $pedidos = $this->pedidoRepository->findWhere(['maquinas_id'=>$request['select']]);

            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
            return $pdf->stream();
        }
        //        --------------------fim relatorio por maquina --------------------

        //        ------------------------ relatorio por problema --------------------
        if ($request['tipo'] == 3) {
            $problema = $this->problemaRepository->find($request['select']);
            $pedidos = $problema->pedido()->get();
            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));

//            download
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');

//            vizualizar
            return $pdf->stream();
        }
        //        ---------------------fim relatorio por problema --------------------

        //        ------------------------ relatorio por tipo manutenção --------------------
        if ($request['tipo'] == 4) {
            $manutencao = $this->tipoManutencao->find($request['select']);
            $pedidos = $manutencao->pedido()->get();
            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));

//            download
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');

//            vizualizar
            return $pdf->stream();
        }
        //        ---------------------fim relatorio por tipo manutenção --------------------

        //        ------------------------ relatorio por sala --------------------
        if ($request['tipo'] == 5) {
            $sala_id = $request['select'];
            $sala = $this->repository->find($sala_id);

            $pedidos = $sala->pedido()->get();

            $pdf = SnappyPdf::loadView('pdf.pedidos', compact('pedidos'));
//            $name = 'Relatório de salas -'. date("d/m/Y H:i:s");
//            return $pdf->download($name.'.pdf');
            return $pdf->stream();
        }
        //        --------------------fim relatorio por sala --------------------

    }
    /*---------------------------Fim Relatório Pedidos-----------------------------------------------------------*/
}