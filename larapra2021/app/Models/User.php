<?php

namespace App\Models;

use App\Models\laracasts\LaracastsUser;
use App\Models\blogcrud\BlogcrudUser;
use App\Models\simablog\SimablogUser;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    const USER_ROLE_ADMIN = 'administrator';
    const USER_ROLE_LARACASTS = 'laracasts';
    const USER_ROLE_BLOGCRUD = 'blogcrud';
    const USER_ROLE_SIMABLOG = 'simablog';

    public function laracasts_user() 
    {
        return $this->hasOne(LaracastsUser::class);
    }

    public function blogcrud_user() 
    {
        return $this->hasOne(BlogcrudUser::class);
    }

    public function simablog_user() 
    {
        return $this->hasOne(SimablogUser::class);
    }
}
