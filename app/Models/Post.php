<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'show_publicly'];
    
    protected $appends = ['blog_image'];

    protected $casts = [
        'show_publicly' => 'boolean',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->show_publicly = (int) $post->show_publicly;
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->show_publicly = (int) $post->show_publicly;
        });

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderByDesc('id');
        });
    }

    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublicPostOnly($query)
    {
        return $query->where('show_publicly', 1);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeOnlyOwnerPosts($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    protected function blogImage(): Attribute
    {
        return new Attribute(
            get: fn () => empty($this->image) ?
                'https://source.unsplash.com/collection/225/800x600' : asset('storage/'. $this->image->url),
        );
    }
}
