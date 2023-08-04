<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\blogComment;

class Blogs extends Model
{
    use HasFactory;

    public $table = 'blog';

    protected $guarded = ['created_at', 'updated_at'];

    public function comments()
    {
        return $this->hasMany(BlogComment::class,'blog_id');
    }
}
