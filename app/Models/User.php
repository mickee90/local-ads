<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property int $account_type_id
 * @property int $city_id
 * @property int $role_id
 * @property string $company_name
 * @property string $corporate_number
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $website
 * @property string $avatar
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'company_name',
        'corporate_number',
        'username',
        'email',
        'phone',
        'website',
        'avatar',
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    public function isAdmin()
    {
        return $this->role_id === 1;
    }
}
