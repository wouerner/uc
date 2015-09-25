<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fluxo;

final class Passo extends Model
{
    protected $table = 'passos';
    public $timestamps = false;

    public function fluxos()
    {
        return $this->belongsToMany('App\Models\Fluxo','passos_fluxos');
    }

    public function regrasNegocio()
    {
        return $this->belongsToMany('App\Models\RegraNegocio','passos_regra_negocios');
    }

    public function mensagens()
    {
        return $this->belongsToMany('App\Models\Mensagem','passos_mensagens');
    }

    public function telas()
    {
        return $this->belongsToMany('App\Models\Tela','passos_telas');
    }
}
