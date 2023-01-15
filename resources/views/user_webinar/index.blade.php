@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

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
                    {{ __('User Webinar') }}
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Meeting Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webinar as $dt)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="width: 10%">
                                    @if(file_exists(public_path("storage/".$dt->webinar->image)))
                                    <img src="{{ asset("storage/".$dt->webinar->image) }}" width="200px" height="300px">
                                    @else
                                    <img src="{{ $dt->webinar->image }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $dt->webinar->title }}</td>
                                <td>{{ $dt->webinar->category->name }}</td>
                                <td>{{ $dt->webinar->date }}</td>
                                <td><a href="{{ $dt->webinar->link }}" target="_blank" class="btn btn-info">Link</a>
                                </td>
                                <td>
                                    <a href="{{ route('user_webinar_destroy', ["id" => $dt->id]) }}"
                                        class="btn btn-danger">Delete</a>
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

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
