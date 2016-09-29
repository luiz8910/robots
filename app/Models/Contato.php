<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contato extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'topic','description', 'name', 'tel', 'subject', 'email', 'msg',
        'address', 'city', 'zipCode', 'telOwner', 'celOwner', 'emailOwner'
    ];

}
