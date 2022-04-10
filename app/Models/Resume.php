<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'file_name',
    ];

    public function getUrlAttribute()
    {
        return asset(Storage::url($this->path));
    }

    public function resumable()
    {
        return $this->morphTo();
    }
}
