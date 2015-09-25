<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Campo extends Model
{
    protected $table = 'campos';
    public $timestamps = false;
}
