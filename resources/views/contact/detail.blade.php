@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Contact Detail
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" readonly value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" readonly value="{{ $data->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" readonly value="{{ $data->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Message</label>
                        <textarea class="form-control" rows="10" readonly>{{ $data->message }}</textarea>
                    </div>
                    <a href="{{ route("contact_index") }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
