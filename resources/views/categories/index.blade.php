@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
