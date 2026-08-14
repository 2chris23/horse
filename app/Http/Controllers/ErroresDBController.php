<?php

namespace App\Http\Controllers;

use App\Models\ErrorControl;
use function compact;

class ErroresDBController extends Controller
{
    //
    public function Index()
    {
        $errores = ErrorControl::orderby('id', 'desc')->paginate();
        return view('Errores.errores', compact('errores'));
    }
}

