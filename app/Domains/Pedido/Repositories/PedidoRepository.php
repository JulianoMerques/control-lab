<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Pedido\Repositories;

use App\Domains\Pedido\Entities\Pedido;
use Prettus\Repository\Eloquent\BaseRepository;

class PedidoRepository extends BaseRepository
{
    public function model()
    {
        return Pedido::class;
    }
}
