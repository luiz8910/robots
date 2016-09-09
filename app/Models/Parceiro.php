<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Parceiro extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        "nome",
        "site",
        "imagem"
    ];

}
