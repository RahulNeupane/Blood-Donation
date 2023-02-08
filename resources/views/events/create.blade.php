@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 m-auto ">
                <div class="section-body justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-center mb-3 justify-content-between">
                                    <h4>Create Event</h4>
                                    <div>
                                        <a href="{{ route('events.index') }}" class="btn btn-primary">View Events</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label>Title: </label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Body: </label>
                                            <textarea name="body" rows="10" class="form-control"></textarea>
                                        </div>
                                        @error('body')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Date: </label>
                                            <input type="datetime-local" name="date" class="form-control">
                                        </div>
                                        @error('date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Image: </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
