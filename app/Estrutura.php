<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrutura extends Model
{
    protected $fillable = [ 'codigo_pai', 'codigo_filho', 'quantidade' ];
    public $timestamps = false;

    public function produtoPai(){
        return $this->belongsTo(Produto::class, 'codigo_pai', 'codigo');
    }

    public function produtoFilho(){
        return $this->belongsTo(Produto::class, 'codigo_filho', 'codigo');
    }
}
