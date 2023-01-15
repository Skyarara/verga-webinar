@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Webinar
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('webinar_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="Description" required
                                cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Date</label>
                            <input type="datetime-local" name="date" class="form-control" placeholder="Date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Meeting Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Meeting Link" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option value="">Choose Category</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" name="status">
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Person</label>
                            <input type="text" name="cp" class="form-control" placeholder="Contact Person" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
