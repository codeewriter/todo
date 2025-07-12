@extends('layouts.main')

@section('title', "Create Todo")
    
@section('content')
    <div class="row justify-content-center">
        <div class="card col-lg-8 border-0">
            <div class="card-body">
                <h5 class="card-title text-center">Create Todo</h5>
                <a href="/todo" class="btn btn-warning btn-sm my-3"><i class="bi bi-arrow-left"></i> Back to lists</a>
                <form action="/todo" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">List name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">List Description</label>
                        <input type="hidden" id="description" name="description" value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="hidden" name="is_done" value="0">
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-danger me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection