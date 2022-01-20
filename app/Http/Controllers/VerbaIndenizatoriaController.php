<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerbaIndenizatoria;

class VerbaIndenizatoriaController extends Controller
{
    /**
     * Acessa o banco das verbas indenizatorias
     *
     * @return App\Models\VerbaIndenizatoria\
     */
    public function retornaVerbaIndenizatorias()
    {
        return VerbaIndenizatoria::all();
    }
}
