<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'resumable',
        'path',
        'file_name',
    ];

    public function resumable()
    {
        return $this->morphTo();
    }
}
