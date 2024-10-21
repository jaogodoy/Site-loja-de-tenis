<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";

    protected $fillable = [
<<<<<<< HEAD
        'categoria_id',
        'produto_nome',
        'produto_quantidade',
        'produto_descricao',
        'produto_preco',
        'produto_genero',
        'produto_imagem'
    ];


=======
                    'categoria_id',
                    'produto_nome',
                    'produto_quantidade',
                    'produto_descricao'
                ];
>>>>>>> 447db2af698af04299cd360d8baf266de0890add

    // Relacionamento com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
