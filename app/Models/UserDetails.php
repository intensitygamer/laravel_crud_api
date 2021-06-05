<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class UserDetails extends Model
{
    use HasFactory, LogsActivity;


    protected static $logName = 'user_details';


    protected static $logAttributes = [
        'address',
        'street',
        'house_no',
        'city',
        'territory',
        'postal_code',
        'country'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'street',
        'house_no',
        'city',
        'territory',
        'postal_code',
        'country',
    ];

    protected $table = 'user_details';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}");

        // Chain fluent methods for configuration options
    }


}


