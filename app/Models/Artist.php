<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
