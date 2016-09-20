<?php

namespace admin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Institucional extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "institucional";

    protected $fillable = [
        "missao",
        "valores",
        "visao"
    ];

}
