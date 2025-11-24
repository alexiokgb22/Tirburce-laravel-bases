<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

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

    protected static function boot(){
        parent::boot();

        //Avant de créer l'article , on génère le slug
        static::creating(function (Article $article) {
            if(empty($article->slug)){
                $article->slug = Str::slug($article->title);
            }
        });
    }
}
