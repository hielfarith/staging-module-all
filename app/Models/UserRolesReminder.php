<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRolesReminder extends Model
{
     public static function getEmailsForReminder()
    
    {
        // Calculate the date 7 days before today
        $exact7DaysFromNow = now()->addDays(7);
    
        // Query the user_roles table to retrieve emails for 7 days before
        $emails7 = DB::table('user_roles')
            ->whereNull('FormFillDate') // User has not submitted the form
            ->whereNotNull('FormFinalDate') // Final date is set
            ->whereDate('FormFinalDate', '>', now()) // FormFinalDate has not passed
            ->whereDate('FormFinalDate', '=', $exact7DaysFromNow) // FormFinalDate is within next 7 days
            ->whereNotNull('email') // Only consider records with a non-null email
            ->pluck('email');
    
        // Calculate the date 1 day before today
        $exact1DayFromNow = now()->addDay();
    
        // Query the user_roles table to retrieve emails for 1 day before
        $emails1 = DB::table('user_roles')
            ->whereNull('FormFillDate') // User has not submitted the form
            ->whereNotNull('FormFinalDate') // Final date is set
            ->whereDate('FormFinalDate', '>', now()) // FormFinalDate has not passed
            ->whereDate('FormFinalDate', '=', $exact1DayFromNow) // FormFinalDate is within next 1 day
            ->whereNotNull('email') // Only consider records with a non-null email
            ->pluck('email');
    
        return [
            'emails7' => $emails7,
            'emails1' => $emails1,
        ];
    }
    
   

    
}