<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Salas\Repositories;

use App\Domains\Salas\Entities\Sala;
use Prettus\Repository\Eloquent\BaseRepository;

class SalaRepository extends BaseRepository
{
    public function model()
    {
        return Sala::class;
    }
}
