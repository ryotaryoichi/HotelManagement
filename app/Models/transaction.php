<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primarykey = 'ID';
    protected $fillable = [
        'ID','transCode','transDate','custName','totalRoomPrice','totalExtraCharge','finalTotal'
    ];
}
