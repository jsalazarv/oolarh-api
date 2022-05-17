<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static paginate($get)
 * @method static find(int $id)
 * @method static findOrFail(int $id)
 */
class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'salary',
        'branch_office_id',
        'department_id',
        'job_id'
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function branchOffice() {
        return $this->belongsTo(BranchOffice::class);
    }

    public function applicant() {
        return $this->hasMany(Applicant::class);
    }
}
