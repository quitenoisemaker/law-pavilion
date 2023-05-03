@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create client Profile</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="date_profiled">Date Profiled<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_profiled" id="date_profiled">
                                </div>
                                <div class="form-group col-12">
                                    <label for="firstname">First Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstname" id="firstname">
                                </div>
                                <div class="form-group col-12">
                                    <label for="lastname">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname" id="lastname">
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group col-12">
                                    <label for="date_of_birth">Date of birth<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                                </div>
                                <div class="form-group col-12">
                                    <label for="image">Profile Image<span class="text-danger">optional</span></label>
                                    <input type="file" class="form-control" name="profile_image" id="image">
                                </div>
                                <div class="form-group col-12">
                                    <label for="case_detail">Case Detail <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="case_detail" id="case_detail" style="resize: none"></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="primary_legal_counsel">Primary Legal Counsel <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="primary_legal_counsel" id="primary_legal_counsel" style="resize: none"></textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
