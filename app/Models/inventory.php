<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'computer_unit',
        'category',
        'quantity',
        'status',
        'remarks',
    ];
}
