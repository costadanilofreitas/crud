<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'codigo';
    public $incrementing = false;

    protected $fillable = [ 'codigo', 'descricao', 'custo_unitario' ];

    public function estruturas(){
        return $this->hasMany(Estrutura::class);
    }
}
