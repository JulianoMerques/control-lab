<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Turno\Repositories;

use App\Domains\Turno\Entities\Turno;
use Prettus\Repository\Eloquent\BaseRepository;

class TurnoRepository extends BaseRepository
{
    public function model()
    {
        return Turno::class;
    }
}
