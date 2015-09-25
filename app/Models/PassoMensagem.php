<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PassoMensagem extends Model
{
    protected $table = 'passos_mensagens';
    public $timestamps = false;
}
