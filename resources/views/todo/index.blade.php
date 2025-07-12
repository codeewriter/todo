@extends('layouts.main')

@section('title', 'My Todo')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-lg-8 border-0">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">User Todo</h5>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="/todo/create" class="btn btn-primary btn-sm mb-3">Add Todo</a>
                <div class="table-responsive small">
                    <table class="table table-hover table-sm table-striped-columns boder">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $loop->iteration + $todos->firstItem() - 1 }}</td>
                                <td>{{ $todo->name }}</td>
                                <td>
                                    @if ($todo->is_done == 0)
                                        Not done
                                    @else
                                        Done
                                    @endif
                                </td>
                                <td>
                                    <a href="/todo/{{ $todo->id }}/edit" class="badge bg-warning border-0"><i class="bi bi-pen"></i></a>
                                    <form action="/todo/{{ $todo->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-x-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                {{ $todos->links() }}
            </div>
        </div>
    </div>
@endsection

