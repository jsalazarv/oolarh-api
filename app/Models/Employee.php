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
        'first_surname',
        'second_surname',
        'birthday',
        'gender',
        'rfc',
        'ssn',
        //'resume',

        /*'email',
        'phone',
        'cellphone',

        'country',
        'state',
        'municipality',
        'suburb',
        'street',
        'outdoor_number',
        'interior_number',
        'postal_code',*/

        'vacancy_id',
        'psychometric_test',
        'salary',
    ];

    public function resume()
    {
        return $this->morphOne(Resume::class, 'resumable');
    }

    public function vacancy() {
        return $this->belongsTo(Vacancy::class);
    }

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
