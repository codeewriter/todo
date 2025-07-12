@extends('layouts.main')

@section('title', "Create Todo")
    
@section('content')
    <div class="row justify-content-center">
        <div class="card col-lg-8 border-0">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Todo</h5>
                <a href="/todo" class="btn btn-warning btn-sm my-3"><i class="bi bi-arrow-left"></i> Back to lists</a>
                <form action="/todo/{{ $todo->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">List name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $todo->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">List Description</label>
                        <input type="hidden" id="description" name="description" value="{{ old('description', $todo->description) }}">
                        <trix-editor input="description"></trix-editor>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_done" id="is_done1" value="1" {{ $todo->is_done == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_done1">Done</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_done" id="is_done2" value="0" {{ $todo->is_done == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_done2">Not done</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection