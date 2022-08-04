<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @method static paginate($get)
 * @method static find($id)
 * @method static findOrFail(int $id)
 */
class BranchOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function vacancies() {
        return $this->hasMany(Vacancy::class);
    }
}

