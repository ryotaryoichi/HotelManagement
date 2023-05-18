<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transactions';
    protected $primarykey = 'ID';
    protected $fillable = [
        'ID','transID','roomID','days','subTotalRoom','extraCharge'
    ];
}
