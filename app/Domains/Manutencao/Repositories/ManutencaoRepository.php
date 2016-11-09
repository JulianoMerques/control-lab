<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Manutencao\Repositories;

use App\Domains\Manutencao\Entities\Manutencao;
use Prettus\Repository\Eloquent\BaseRepository;

class ManutencaoRepository extends BaseRepository
{
    public function model()
    {
        return Manutencao::class;
    }
}
