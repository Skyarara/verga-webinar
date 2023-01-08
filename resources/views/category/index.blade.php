@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Category') }}
                    <a class="btn btn-primary float-end" href="{{ route('category_create') }}">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $dt)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $dt->name }}</td>
                                <td style="width: 30%">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('category_edit', ["id" => $dt->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('category_destroy', ["id" => $dt->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
