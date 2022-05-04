<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate($get)
 * @method static create(array $all)
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 */
class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function vacancies() {
        return $this->hasMany(Vacancy::class);
    }
}
