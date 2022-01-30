<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'post_comment';

    protected $fillable = [
        'theme_id',
        'user_id',
        'comment',
        'deleted'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
