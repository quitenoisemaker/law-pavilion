@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create client Profile</div>
                    <div class="card-body">
                        {{$clientDetail->email}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
