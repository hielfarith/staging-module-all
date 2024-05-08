<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRolesReminder extends Model
{
    public static function getEmailsForReminder()
    {
        // Calculate the date 7 days before today
        $exactsevenDaysFromNow = now()->addDays(7);

        // Query the user_roles table to retrieve emails based on the conditions
        $emails = DB::table('user_roles')
            ->whereNull('FormFillDate') // User has not submitted the form
            ->whereNotNull('FormFinalDate') // Final date is set
            ->whereDate('FormFinalDate', '>', now()) // FormFinalDate has not passed
            ->whereDate('FormFinalDate', '=', $exactsevenDaysFromNow) // FormFinalDate is within next 7 days
            ->whereNotNull('email') // Only consider records with a non-null email
            ->pluck('email');

        return $emails;
    }
   
}