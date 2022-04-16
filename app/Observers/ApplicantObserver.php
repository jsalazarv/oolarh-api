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
            $employee = new Employee();
            $employee->names = $applicant->names;
            $employee->first_surname = $applicant->first_surname;
            $employee->second_surname = $applicant->second_surname;
            $employee->email = $applicant->email;
            $employee->cellphone = $applicant->cellphone;
            $employee->psychometric_test = $applicant->psychometric_test;
            $employee->vacancy = $applicant->vacancy;

            $employee->save();
        }
    }
}
