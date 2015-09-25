<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Mensagem extends Model
{
    protected $table = 'mensagens';
    public $timestamps = false;
}
