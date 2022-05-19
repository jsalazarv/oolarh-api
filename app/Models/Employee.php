<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate($get)
 * @method static findOrFail($id)
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

    public function vacancy() {
        return $this->belongsTo(Vacancy::class);
    }
}
