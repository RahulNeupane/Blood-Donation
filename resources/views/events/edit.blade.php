@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 m-auto ">
                <div class="section-body justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-center mb-3">
                                    <h4>Update Event</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label>Title: </label>
                                            <input type="text" class="form-control" name="title" value="{{$event->title}}">
                                        </div>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Body: </label>
                                            <textarea name="body" rows="10" class="form-control">{{$event->body}}</textarea>
                                        </div>
                                        @error('body')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Date: </label>
                                            <input type="datetime-local" name="date" class="form-control" value="{{$event->date}}">
                                        </div>
                                        @error('date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <label>Image: </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ url('/images/events/' . $event->image) }}" alt="event" width="150">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
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
