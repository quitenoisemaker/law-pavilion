<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'primary_legal_counsel' => $this->primary_legal_counsel,
            'profile_image' => is_null($this->profile_image) ? 'No Image' : URL::asset('storage/' . $this->profile_image),
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'case_detail' => $this->case_detail,
            'show_link' => route('clients.show', ['clientDetail' => $this->id]),
            'date_profiled' => $this->created_at->format('Y-m-d'),
        ];
    }
}
