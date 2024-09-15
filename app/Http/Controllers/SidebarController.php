<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function someMethod()
    {
        $type_menu = 'dashboard'; // atau nilai yang sesuai
        return view('blank-page', compact('type_menu'));
    }
}
