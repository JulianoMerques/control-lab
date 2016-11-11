<?php


namespace App\Domains\TipoManutencao\Repositories;

use App\Domains\TipoManutencao\Entities\TipoManutencao;
use Prettus\Repository\Eloquent\BaseRepository;

class TipoManutencaoRepository extends BaseRepository
{
    public function model()
    {
        return TipoManutencao::class;
    }
}
