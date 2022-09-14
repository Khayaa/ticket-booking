<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = [
        'price',
        'status',
        'event_type',
        'title',
        'description',
        'date',
        'time',
        'thumbnail',
        'number_of_tickets',
        'sold_tickets',
        'slug'



    ];

    const EventStatus = [
        'active'=> 'Active',
        'inactive'=> 'In-Active',


    ];

    const EventType = [
        'paid'=> 'Paid Event',
        'free'=> 'Free Event',


    ];
}
