<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSummary extends Model
{
    protected $table = 'post_summary';
    protected $fillable = ['metrics_summary'];
    use HasFactory;
}
