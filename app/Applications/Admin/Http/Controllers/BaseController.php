<?php
namespace App\Applications\Admin\Http\Controllers;

use App\Core\Http\Controllers\Controller;

class BaseController extends Controller {
    protected $viewNamespace = 'admin::';
}