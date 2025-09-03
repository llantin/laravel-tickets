<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'state',
        'user_id',
        'customer_id',
        'opened_at',
        'closed_at',
    ];
}
