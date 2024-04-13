<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['content'];

    use HasFactory;

    public function PostSummary()
    {
        return $this->hasOne(PostSummary::class, 'post_id');
    }

    protected $dispatchesEvents = [
        'saving' => \App\Events\PostSaving::class,
    ];
}
