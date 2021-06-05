<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetails;
use App\Models\User;

class Admin extends Model
{
    use HasFactory, Notifiable;

	protected static $logName = 'admin';

    public function user_info(){

        return $this->hasOne(User::class, 'id', 'user_id');
 
    }
 
    public function user_details(){

        return $this->hasOne(UserDetails::class, 'user_id', 'user_id' );
 
    }  
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}");
        // Chain fluent methods for configuration options
    }
    
}
