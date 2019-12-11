<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ul($value)
    {
        $GLOBALS = array(
            'val' => $value
        );
    }

    public function sul()
    {
        return $GLOBALS['1'];
    }
}
