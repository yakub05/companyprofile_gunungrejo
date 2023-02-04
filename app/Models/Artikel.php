<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
                'source' => 'ArtikelJudul'
            ]
        ];
    }
}
