<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $fillable = [
    'nome',
    'email',
    'telefone',
    'cpf'
    ];
    use HasFactory;
    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
