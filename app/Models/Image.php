<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type',
    ];

    /**
     * Get the parent imageable model for user and post.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
