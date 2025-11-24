<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image_path',
        'is_published',
          
    ];

    // Relation: Un article appartient à un utilisateur (auteur)
    //$article->user : on récupère l'article et l'utilisateur associé à l'articl
    //$article->user(): on récupère la relation entre l'article et l'utilisateur associé et sur laquelle on peut faire des requêtes plus complexes comme par exemple: 
    public function user(){
        return $this->belongsTo(User::class);
    }
}
