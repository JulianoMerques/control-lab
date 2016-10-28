<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Maquina\Repositories;

use App\Domains\Maquina\Entities\Maquina;
use Prettus\Repository\Eloquent\BaseRepository;

class MaquinaRepository extends BaseRepository
{
    public function model()
    {
        return Maquina::class;
    }
}
