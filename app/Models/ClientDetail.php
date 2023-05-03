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
        'case_detail', 'date_profiled'
    ];

    /**
     * Stores a new client profile in the database.
     *
     * @param  array  $request An array of data containing the client's information, as submitted via an HTTP request.
     * @return \App\Models\Client The newly created client profile.
     */
    public static function storeClientProfile($request)
    {
        return self::create($request);
    }

    /**
     * Returns a list of clients.
     *
     * @return \Illuminate\Database\Eloquent\Builder A query builder instance that can be used to retrieve the clients.
     */
    public static function getClients()
    {
        return self::select(
            'id',
            'firstname',
            'lastname',
            'profile_image',
            'email',
            'date_profiled',
            'date_of_birth'
        )->orderBy('id', 'DESC');
    }

    /**
     * Scope to filter records where the profile image is null.
     *
     * This function adds a WHERE clause to the query to filter records where the 'profile_image' attribute is null.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query The query builder instance.
     * @return void
     */
    public function scopeNullProfileImage($query): void
    {
        $query->whereNull('profile_image');
    }

    /**
     * Local scope to search name
     *
     * @param  mixed $query
     * @param  string $searchName
     * @return void
     */
    public function scopeSearchLastName($query, $searchName): void
    {
        $query->where('lastname', 'LIKE', '%' . $searchName . '%');
    }

    /**
     * Accessor to concatenate firstname and lastname
     *
     * @return string The full name of the user
     */
    public function getFullNameAttribute()
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }
}
