<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const TYPE_REGULAR = 'REGULAR';
    const TYPE_PLATINUM = 'PLATINUM';
    const TYPE_GOLD = 'GOLD';
    const TYPE_SILVER = 'SILVER';

    public static $types = [
        self::TYPE_REGULAR,
        self::TYPE_PLATINUM,
        self::TYPE_GOLD,
        self::TYPE_SILVER,
    ];
}
