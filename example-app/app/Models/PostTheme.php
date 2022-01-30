<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTheme extends Model
{
    use HasFactory;

    protected $table = 'post_theme';

    protected $fillable = [
        'name',
        'user_id',
        'deleted'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
