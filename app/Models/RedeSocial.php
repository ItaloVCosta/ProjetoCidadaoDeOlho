<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table = 'rede_sociais';
    protected $fillable =[
        'id',
        'rede_nomes',
        'quantidade_usuarios'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
