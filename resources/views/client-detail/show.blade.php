@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h2>{{$clientDetail->fullName}}</h2></div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-6">
                                <h4><b>Profile Image</b></h4>
                                @if ($clientDetail->profile_image)
                                <img src="{{ URL::asset('storage/' . $clientDetail->profile_image) }}"
                                                        width="200" class='img-fluid rounded-circle mb-3'>
                                @else
                                <p class="mb-0">{{'No Image'}}</p>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h4><b>Client Details</b></h4>
                                <p class="mb-0"><b>Date of birth:</b> {{$clientDetail->date_of_birth}}</p>
                                <p class="mb-0"><b>Email </b>{{$clientDetail->email}}</p>
                                <p class="mb-0"><b>Primary Legal Counsel:</b> {{$clientDetail->primary_legal_counsel}}</p>
                                <p class="mb-0"><b>Case Detail:</b> {{$clientDetail->case_detail}}</p>
                                <p class="mb-0"><b>Date Profiled:</b> {{$clientDetail->date_profiled}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
