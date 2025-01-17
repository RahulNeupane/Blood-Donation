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
                                    <h4>Edit reward</h4>
                                    <div>
                                        <a href="{{ route('reward.index') }}" class="btn btn-primary">View reward</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('reward.update',$reward->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label>Title: </label>
                                            <input type="text" class="form-control" name="title" value="{{ $reward->title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Image: </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ url('/images/reward/' . $reward->image) }}" alt="image" width="150"></td>
                                        </div>
                                        <div class="mb-3">
                                            <label>Point: </label>
                                            <input type="text" class="form-control" name="point" value="{{ $reward->point }}">
                                        </div>
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
