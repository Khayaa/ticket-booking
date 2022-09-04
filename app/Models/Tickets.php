<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [

        'status'

    ];
    public function Users(){
        return $this->belongsTo(User::class);
    }


    public function Events(){
        return $this->belongsTo(Events::class);
    }
}
