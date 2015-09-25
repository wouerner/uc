<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PassoTela extends Model
{
    protected $table = 'passos_telas';
    public $timestamps = false;
}
