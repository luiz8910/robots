<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Questionario extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name', 'email', 'pergunta1', 'pergunta2',
        'pergunta3', 'pergunta4', 'pergunta5', 'pergunta6',
    ];

}
