<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lend extends Model
{
    use HasFactory,SoftDeletes;

	protected $fillable = [
        'customer_user_id', // Prestador
        'owner_user_id', // Bibliotecario
        'book_id',
        'date_out',
        'date_in',
        'date_request',
        'status'
    ];	
}
