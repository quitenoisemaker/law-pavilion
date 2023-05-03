<?php

namespace App\Http\Controllers;

use App\Events\ClientCreated;
use App\Http\Requests\StoreClientDetailRequest;
use App\Models\ClientDetail;
use App\Service\Client\ClientDetailService;
use Illuminate\Http\Request;

class ClientDetailController extends Controller
{

    protected $clientDetailService;

    public function __construct(ClientDetailService $clientDetailService)
    {
        $this->clientDetailService = $clientDetailService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory of list of clients
     */
    public function index()
    {
        $noOfRecords = 10;
        $clients = ClientDetail::getClients()->paginate($noOfRecords);

        return view('client-detail.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Facto
     */
    public function create()
    {
        return view('client-detail.create');
    }

    /**
     * Display the specified resource .
     *
     * @param  App\Models\ClientDetail $clientDetail
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(ClientDetail $clientDetail)
    {
        return view('client-detail.show', compact('clientDetail'));
    }

    /**
     * Store a newly created resource in database and send welcoming mail.
     *
     * @param  App\Http\Requests\StoreClientDetailRequest  $request The request object containing store parameters.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientDetailRequest $request)
    {
        $validatedData = $request->validated();
        $imagePath = $this->clientDetailService->storeClientProfileImage($request);
        $validatedData['profile_image'] = $imagePath;
        $client = ClientDetail::storeClientProfile($validatedData);

        ClientCreated::dispatch($client->email);

        return redirect('clients/index');
    }

    /**
     * Filters client details based on last name using the provided Request object.
     *
     * @param Request $request The request object containing filter parameters.
     * @return array Returns an array with the following keys:
     * 'success': A boolean indicating whether the operation was successful.
     * 'totalRecords': The total number of records returned by the filter.
     * 'data': The filtered client details returned as a collection.
     */
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
