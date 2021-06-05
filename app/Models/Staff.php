<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\UserDetails;
use App\Models\User;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Staff extends Model
{
    use HasFactory, Notifiable, LogsActivity;

    protected $table = 'staffs';
    protected static $logName = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'user_id',    
    ];

    protected static $logAttributes = [
        'client_id'
    ];


    public function user_info(){

        return $this->hasOne(User::class, 'id', 'user_id');
        //return $this->belongsTo(UserDetails::class, 'user_id');

    }
    public function user_details(){

        return $this->hasOne(UserDetails::class, 'user_id', 'user_id' );
        //return $this->belongsTo(UserDetails::class, 'user_id');

    }  
    
    public function client_details(){

        return $this->hasOne(UserDetails::class, 'client_id', 'id' );
        //return $this->belongsTo(UserDetails::class, 'user_id');

    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}");
        // Chain fluent methods for configuration options
    }

}
