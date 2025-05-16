<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      "title",
      "content",
      "image",
      "category_id",
    ];

    public function category(){
        return $this->belongsTo(Category::Class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::Class);
    }
}
