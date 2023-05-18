@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Books') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">{{ __('Add books') }}</a>

                       <table class="table">
                           <thead>
                               <tr>
                                   <th>{{ __('ID') }}</th>
                                   <th>{{ __('Name') }}</th>							
                                   <th>{{ __('Category') }}</th>
								   <th>{{ __('Author') }}</th>
								   <th>{{ __('Date Created') }}</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($books as $books)
                                   <tr>
                                       <td>{{ $books->id }}</td>
                                       <td>{{ $books->title }}</td>
										<td>{{ $books->category }}</td>
										<td>{{ $books->author }}</td>
									<td>{{ $books->created_at }}</td>
                                       <td>
                                           <a href="{{ route('books.edit', $books->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                                           <form action="{{ route('books.destroy', $books->id) }}" method="POST" class="d-inline">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                           </form>
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

