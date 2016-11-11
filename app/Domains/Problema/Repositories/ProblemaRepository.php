<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Problema\Repositories;

use App\Domains\Problema\Entities\Problema;
use Prettus\Repository\Eloquent\BaseRepository;

class ProblemaRepository extends BaseRepository
{
    public function model()
    {
        return Problema::class;
    }
}
