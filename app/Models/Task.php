<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define os atributos que podem ser preenchidos em massa
    protected $fillable = ['title', 'description', 'category_id', 'completed'];

    // Define o relacionamento com o modelo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
