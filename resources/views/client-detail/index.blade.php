@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 pb-4"> <a href="{{ route('clients.create') }}" class="btn btn-success btn-sm m-1">Click
                    Here to Profile client</a>
            </div>

            <form>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" name="search_client" id="searchClient"
                            placeholder="Search Client by Last name">
                    </div>
                    <div class="col-auto">
                        <button type="submit" id="filter_page"class="btn btn-primary mb-2">Search</button>
                    </div>
                </div>
            </form>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            @if (count($clients) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">Date Profiled</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="client-body">
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @if ($client->profile_image)
                                                    <img src="{{ URL::asset('storage/' . $client->profile_image) }}"
                                                        width="100">
                                                @else
                                                    <p>No image</p>
                                                @endif
                                            </td>
                                            <td>{{ $client->firstname }}</td>
                                            <td>{{ $client->lastname }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->date_of_birth }}</td>
                                            <td><a href="{{ route('clients.show', ['clientDetail' => $client->id]) }}"
                                                class="btn btn-success">View profile</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="text-center">{{ 'No Clients, click on the button above to profile client' }}
                                </div>
                            @endif
                        </table>
                    </div>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('client-detail.script')
@endsection
