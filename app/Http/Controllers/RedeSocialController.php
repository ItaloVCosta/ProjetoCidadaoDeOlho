<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RedeSocial;

class RedeSocialController extends Controller
{
    /**
     * Acessa o banco das redes sociais
     *
     * @return \App\Models\RedeSocial
     */
    public function index()
    {
        return RedeSocial::all();
    }
}
