<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define os atributos que podem ser preenchidos em massa
    protected $fillable = ['name'];

    // Define o relacionamento com o modelo Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
