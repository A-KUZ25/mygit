<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasFactory, Filterable;
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
