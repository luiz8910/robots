<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteImagem extends Model
{
    protected $table = "cliente_imagens";

    protected $fillable = [
        "cliente_id",
        "imagem",
        "extensao"
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
