<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiting extends Model
{
    use HasFactory;

    protected $attributes = [
        'order' => 1,
    ];

    protected $fillable=[
        'patient_id',
        'order_id',
        'order',
    ];
}
