<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @method static paginate($get)
 * @method static findOrFail($id)
 * @method static create(array $all)
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'vacancy_id',
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

    public function vacancy() {
        return $this->belongsTo(Vacancy::class);
    }
}
