<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     * 
     * 
     */

     protected $connection='mongodb';
     protected $table='users';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_image',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts=[
        'email_verified_at' => 'datetime',
            'password' => 'hashed',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function post(): HasMany 
    {
        return $this->hasMany(related: Post::class);

    }


      public function likes(): HasMany 
    {
        return $this->hasMany(related: Like::class);

    }

      public function comments(): HasMany 
    {
        return $this->hasMany(related: Comment::class);

    }
}
