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
            $employee = new Employee($applicant->getAttributes());
            $employee->save();
        }
    }
}
