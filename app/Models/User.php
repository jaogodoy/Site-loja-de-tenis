<?php

<<<<<<< HEAD

namespace App\Models;

=======
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
        'email',
        'password',
    ];

<<<<<<< HEAD
=======
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Se você tiver um relacionamento com outros modelos, adicione métodos aqui
=======
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
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
}
