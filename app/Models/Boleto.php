<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;

    protected $fillable = [
        'habilitado',
        'concurso',
        'serie',
        'is_used',
        'hasher',
        'hasher2',
        'hash',
        'md5hash',
        'numeros',
        'contador1',
        'contador2',
    ];
}
