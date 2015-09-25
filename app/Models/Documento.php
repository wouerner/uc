<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Documento extends Model
{
    protected $table = 'documentos';
    public $timestamps = false;
}
