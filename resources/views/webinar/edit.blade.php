@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Webinar
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('webinar_update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $webinar->id }}">
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title"
                                value="{{ $webinar->title }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="Description" required
                                cols="30" rows="10">{{ $webinar->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Date</label>
                            <input type="datetime-local" name="date" class="form-control" placeholder="Date"
                                value="{{ $webinar->date }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Meeting Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Meeting Link"
                                value="{{ $webinar->link }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                @foreach ($category as $item)
                                <option {{ $webinar->category_id == $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" name="status"
                                {{ $webinar->status ? "checked" : "" }}>
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="form-text  text-danger">
                                leave blank if you don't want the image to be replaced
                            </small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Person</label>
                            <input type="text" name="cp" class="form-control" placeholder="Contact Person"
                                value="{{ $webinar->cp }}" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
