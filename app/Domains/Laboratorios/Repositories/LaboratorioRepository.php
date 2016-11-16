<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Laboratorios\Repositories;

use App\Domains\Laboratorios\Entities\Laboratorios;
use Prettus\Repository\Eloquent\BaseRepository;

class LaboratorioRepository extends BaseRepository
{
    public function model()
    {
        return Laboratorios::class;
    }
}
