<?php

namespace App\Models;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory, Sluggable;

    protected $fillable=[
        'ArtikelFoto',
        'ArtikelJudul',
        'ArtikelSlug',
        'WaktuPembuatan',
        'ArtikelDeskripsi',
        'Author',
    ];

    public function sluggable(): array
    {
        return [
            'ArtikelSlug' => [
                'source' => 'ArtikelJudul',
                'onUpdate' => true,
            ]
        ];
    }

    const EXCERPT_LENGTH = 100;
    public function excerpt()
    {
        return Str::limit($this->ArtikelDeskripsi, Artikel::EXCERPT_LENGTH);
    }
}
