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


    public static function storeClientProfile($request)
    {
        return self::create($request);
    }

    public static function getClients()
    {
        return self::select(
            'id',
            'firstname',
            'lastname',
            'profile_image',
            'email',
            'created_at',
            'date_of_birth'
        )->orderBy('id', 'DESC');
    }

    public function scopeNullProfileImage($query): void
    {
        $query->whereNull('profile_image');
    }

    public function scopeSearchLastName($query, $searchName): void
    {
        $query->where('lastname', 'LIKE', '%' . $searchName . '%');
    }
}
