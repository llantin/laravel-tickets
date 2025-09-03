<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'name',
        'dni',
        'email',
        'password',
        'phone_number',
    ];
    public function getShortNameAttribute(): string
    {
        return explode(' ', $this->name)[0] . ' ' . explode(' ', $this->name)[2];
    }
}
