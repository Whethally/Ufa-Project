<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        
        'image_before',
        'image_after',

        'published',
        'user_id',
        'category_id',
        'status_id',
        'reason',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
