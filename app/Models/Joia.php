<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joia extends Model
{
    use HasFactory;

    protected $table = "joias";
    
    protected $fillable = [
        "nome",
        "material",
        "valor",
        "categoria_id",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
