<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientDetailRequest;
use App\Models\ClientDetail;
use App\Service\Client\ClientDetailService;
use Illuminate\Http\Request;

class ClientDetailController extends Controller
{
    //

    protected $clientDetailService;

    public function __construct(ClientDetailService $clientDetailService)
    {
        $this->clientDetailService = $clientDetailService;
    }

    public function index()
    {
        $noOfRecords = 10;
        $clients = ClientDetail::getClients()->paginate($noOfRecords);

        return view('client-detail.index', compact('clients'));
    }

    public function create()
    {
        return view('client-detail.create');
    }

    public function store(StoreClientDetailRequest $request)
    {
        $validatedData = $request->validated();
        $imagePath = $this->clientDetailService->storeClientProfileImage($request);
        $validatedData['profile_image'] = $imagePath;
        ClientDetail::storeClientProfile($validatedData);

        return redirect('clients/index');
    }

    public function filter(Request $request)
    {
        $queryData = $this->clientDetailService->searchClientByLastName($request);

        return [
            'success' => true,
            'totalRecords' => $queryData->count(),
            'data' => $queryData
        ];
    }
}
