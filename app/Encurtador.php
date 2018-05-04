<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encurtador extends Model
{
    protected $table = 'encurtador';

    protected $fillable = [
        'url_destino', 
        'alias', 
        'observacoes',
        'user_id',
        'validade'
    ];

    public function adicionaClique(){
        $this->cliques = $this->cliques + 1;
    }

}
