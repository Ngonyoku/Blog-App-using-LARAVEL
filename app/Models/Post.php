<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    # Logic for querrying Posts that have been published
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

     # Logic for querrying Posts that have been published
     public function scopeFeatured($query) {
        $query->where('featured', true);
    }
}
