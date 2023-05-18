<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomType extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    protected $primarykey = 'ID';
    protected $fillable = [
        'ID','type'
    ];
}
