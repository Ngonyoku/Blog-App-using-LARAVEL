<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    # Logic for querrying Posts that have been published
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    # Logic for querrying Posts that have been published
    public function scopeFeatured($query) {
        $query->where('featured', true);
    }

    # Excerpt is a shortened blog post body, it will be displayed in the blog page
    public function getExcerpt() {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime() {
        // $words = str_word_count(strip_tags($this->body));
        // $minutes = floor($words / 200);
        // $seconds = floor($words % 200 / (200 / 60));

        // return $minutes;
        $mins = round(str_word_count($this->body) / 250);
        return ($mins < 1) ? 1 : $mins;
    }
}
