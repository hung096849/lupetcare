<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Customers extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    use Sluggable;
    const MEMBER = 0;
    const CUSTOMER = 1;
    const CONFIRM = 1;
    const UNCONFIRM = 0;

    protected $table = 'customers'; 
    protected $fillable = [
        'name',
         'phone',
          'email', 
          'email_verified_at',
           'password',
           're_password',
           'verification_code',
           'is_verified', 'status', 'note', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
