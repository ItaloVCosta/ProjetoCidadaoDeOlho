<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RedeSociail;

class RedeSocialController extends Controller
{
    /**
     * Acessa o banco das redes sociais
     *
     * @return RedesSociais:all
     */
    public function retornaRedesSociais()
    {
        echo "Redes Sociais funcionou";
    }
}
