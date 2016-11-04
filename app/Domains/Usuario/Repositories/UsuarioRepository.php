<?php

/**
 * @author 4UpWeb <contato@4upweb.com>
 */

namespace App\Domains\Usuario\Repositories;

use App\Domains\Usuario\Entities\Usuario;
use Prettus\Repository\Eloquent\BaseRepository;

class UsuarioRepository extends BaseRepository
{
    public function model()
    {
        return Usuario::class;
    }
}
