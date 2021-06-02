<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\UserDetails;

class Staff extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'user_id',    
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


}
