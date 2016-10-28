<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Laboratorio\Repositories;

use App\Domains\Laboratorio\Entities\Laboratorio;
use Prettus\Repository\Eloquent\BaseRepository;

class LaboratorioRepository extends BaseRepository
{
    public function model()
    {
        return Laboratorio::class;
    }
}
