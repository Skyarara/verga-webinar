@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Category
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category_store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
