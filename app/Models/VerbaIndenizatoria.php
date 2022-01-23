<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbaIndenizatoria extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table = 'verba_indenizatorias';
    protected $fillable =[
        'id',
        'deputado_ids',
        'mes',
        'deputado_nomes',
        'reembolso_valores'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
