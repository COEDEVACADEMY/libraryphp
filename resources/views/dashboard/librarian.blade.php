@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">{{ __('Category') }}</div>
                                    <div class="card-body">
                                        <a href="{{ route('categories.index') }}" class="btn btn-primary">{{ __('Category') }}</a>
                                    </div>
                                </div>
                            </div>
							</br>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">{{ __('Books') }}</div>
                                    <div class="card-body">
                                        <a href="{{ route('books.index') }}" class="btn btn-primary">{{ __('Books') }}</a>
                                    </div>
                                </div>
                            </div>
							</br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
