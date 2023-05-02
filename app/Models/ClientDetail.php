<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'primary_legal_counsel',
        'email', 'date_of_birth', 'profile_image',
        'case_detail'
    ];
}