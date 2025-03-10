<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property \App\Enums\Role\Type $role
 * @property string $name
 * @property string $postal_code
 * @property string $address
 * @property string $tel
 * @property string $email
 * @property string $password
 * @property string $verification_code
 * @property \Carbon\CarbonImmutable|null $verification_generated_at
 * @property \Carbon\CarbonImmutable|null $email_verified_at
 * @property \App\Enums\User\Status $status
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 */
class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'role' => \App\Enums\Role\Type::class,
        'postal_code' => 'string',
        'address' => 'string',
        'tel' => 'string',
        'email' => 'string',
        'password' => 'string',
        'verification_code' => 'string',
        'verification_generated_at' => 'immutable_datetime',
        'email_verified_at' => 'immutable_datetime',
        'status' => \App\Enums\User\Status::class,
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime',
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }
}
