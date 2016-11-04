<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\TipoUser\Repositories;

use App\Domains\TipoUser\Entities\Tipo;
use Prettus\Repository\Eloquent\BaseRepository;

class TipoRepository extends BaseRepository
{
    public function model()
    {
        return Tipo::class;
    }
}
