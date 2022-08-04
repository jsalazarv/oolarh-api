<?php

namespace App\Observers;

use App\Models\Applicant;
use App\Models\Employee;

class ApplicantObserver
{
    public function created(Applicant $applicant)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\Applicant $applicant
     * @return void
     */
    public function updated(Applicant $applicant)
    {
        $status = $applicant->status;
        if($status === "accepted") {
            // TODO: check if the employee already exists
            $resume = $applicant->resume;
            $employee = new Employee($applicant->getAttributes());
            $employee->profile_status = "incomplete";
            $employee->employee_status = "active";
            $employee->save();
            $employee->contact()->create([
                'email' => $applicant->email,
                'cellphone' => $applicant->cellphone,
            ]);
            $employee->resume()->create([
                'path' => $resume->path,
                'file_name' => $resume->file_name
            ]);
        }
    }
}
