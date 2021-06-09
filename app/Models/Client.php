<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetails;
use App\Models\User;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use App\Helpers\TokenHelper;

class Client extends Model
{
    use HasFactory, Notifiable, LogsActivity;

    protected static $logName = 'staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',    
        'crm_url',    
        'crm_token_id',    
    ];

    protected static $logAttributes = [
        'name',    
        'crm_url',    
         
    ];

    public $incrementing = false;

    protected static function boot(){

        parent::boot();
            
        static::creating(function ($model) {
                $model->crm_token_id = $model->crm_token_id();
            });

    }
    
    public function crm_token_id()
    {
        return TokenHelper::activationCode(array( 'length' => 12, 'alphanumeric' => false));
    }

    public function user_info(){

        return $this->hasOne(User::class, 'id', 'user_id');
        //return $this->belongsTo(UserDetails::class, 'user_id');

    }
    public function user_details(){

        return $this->hasOne(UserDetails::class, 'user_id', 'user_id' );
        //return $this->belongsTo(UserDetails::class, 'user_id');

    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}");

        // Chain fluent methods for configuration options
    }
}