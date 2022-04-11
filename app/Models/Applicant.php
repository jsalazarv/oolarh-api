<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate($get)
 */
class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'vacancy',
        'first_surname',
        'second_surname',
        'email',
        'cellphone',
        'psychometric_test',
    ];

    public function resume()
    {
        return $this->morphOne(Resume::class, 'resumable');
    }
}
