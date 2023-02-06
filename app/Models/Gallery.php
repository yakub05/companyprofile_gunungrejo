<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable=[
        'GalleryFoto',
        'GalleryJudul',
        'GallerySlug',
        'GalleryTanggal',
        'GalleryDeskripsi'
    ];

    public function sluggable(): array
    {
        return [
            'GallerySlug' => [
                'source' => 'GalleryJudul',
                'onUpdate' => true,
            ]
        ];
    }
}
