<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Seller extends User
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'company_name',
        'socials',
        'name',
        'last_name',
        'email',
        'number',
        'date_birth',
        'adress',
        'sex',
        'password'
    ];

}
