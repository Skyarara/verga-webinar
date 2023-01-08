@extends('layouts.app')

@section('css')
<style>
    img {
        min-width: 200px;
        min-height: 300px;

        max-width: 200px;
        max-height: 300px;
    }

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Category') }}
                    <a class="btn btn-primary float-end" href="{{ route('webinar_create') }}">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webinar as $dt)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="width: 10%">
                                    @if(file_exists(public_path("storage/".$dt->image)))
                                    <img src="{{ asset("storage/".$dt->image) }}" width="200px" height="300px">
                                    @else
                                    <img src="{{ $dt->image }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $dt->title }}</td>
                                <td>{{ $dt->category->name }}</td>
                                <td>{{ $dt->date }}</td>
                                <td>
                                    @if($dt->status == 1)
                                    <label class="text-success">Active</label>
                                    @else
                                    <label class="text-danger">Not Active</label>
                                    @endif
                                </td>
                                <td style="width: 15%">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('webinar_edit', ["id" => $dt->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('webinar_destroy', ["id" => $dt->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                        <a href="{{ route('webinar_status', ["id" => $dt->id]) }}"
                                            class="btn btn-info">Status</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $webinar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
