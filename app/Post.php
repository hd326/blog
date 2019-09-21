<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
