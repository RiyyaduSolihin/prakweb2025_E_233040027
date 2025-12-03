<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Melindungi kolom 'id' dari mass assignment, kolom lain bebas diisi
    protected $guarded = ['id'];

    // Eager loading: Otomatis load relasi author dan category saat query Post
    protected $with = ['author', 'category'];

    // Relasi Many-to-One: Post ditulis oleh satu User (author)
        // Post.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi belongsTo untuk User (author)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Tetap ada untuk backward compatibility
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Query Scope: Filter pencarian berdasarkan search, category, atau author
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter berdasarkan judul (search)
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );

        // Filter berdasarkan slug category
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
                $query->whereHas('category', fn($query) =>
                    $query->where('slug', $category))
        );

        // Filter berdasarkan username author
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
                $query->whereHas('author', fn($query) =>
                    $query->where('username', $author))
        );
    }



}