<?php

namespace App\Service\Client;

use App\Models\ClientDetail;
use Illuminate\Support\Facades\URL;
use App\Http\Resources\ClientDetailResource;

class ClientDetailService
{

    /**
     * Store the image in the public disk storage
     *
     * @param  \Illuminate\Http\Request $request->profile_image
     * @return $imagePath
     */
    public function storeClientProfileImage($request)
    {
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('clientImage', 'public');
            return  $imagePath;
        }
    }

    public function searchClientByLastName($request)
    {
        $noOfRecords = 10;
        $searchClient = $request->search_client;
        $query = ClientDetail::getClients();

        if ($searchClient) {
            $query = $query->searchLastName($searchClient);
        }
        $query = $query->paginate($noOfRecords);

        $queryData = [];
        $queryData = ClientDetailResource::collection($query);

        return $queryData;
    }
}
