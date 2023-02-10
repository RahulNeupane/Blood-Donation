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
                                    <h4>Create Blog</h4>
                                    <div>
                                        <a href="{{ route('blog.index') }}" class="btn btn-primary"> View Blogs</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('blog.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label>Photo: </label>
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select name="blog_category_id" class="form-control">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Title: </label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug: </label>
                                            <input type="text" class="form-control" name="slug">
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Description: </label>
                                            <input type="text" class="form-control" name="short_description">
                                        </div>
                                        <div class="mb-3">
                                            <label>Description: </label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                        <div class="mb-3">
                                            <label>Show Comment: </label>
                                            <select name="show_comment" class="form-control">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
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
