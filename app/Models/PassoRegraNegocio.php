<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PassoRegraNegocio extends Model
{
    protected $table = 'passos_regra_negocios';
    public $timestamps = false;
}
