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
                                    <h4>Edit Blog</h4>
                                    <div>
                                        <a href="{{ route('blog.index') }}" class="btn btn-primary"> View Blogs</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('blog.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <img src="{{ url(asset('images/blogs/' . $item->photo)) }}" alt=""
                                                width="120">
                                        </div>
                                        <div class="mb-3">
                                            <label>Photo: </label>
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select name="blog_category_id" class="form-control">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        @if ($cat->id == $item->blog_category_id) selected @endif>
                                                        {{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Title: </label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $item->title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug: </label>
                                            <input type="text" class="form-control" name="slug"
                                                value="{{ $item->slug }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Description: </label>
                                            <input type="text" class="form-control" name="short_description"
                                                value="{{ $item->short_description }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Description: </label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $item->short_description }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Show Comment: </label>
                                            <select name="show_comment" class="form-control">
                                                <option value="Yes" @if ($item->show_comment=="Yes")
                                                    selected
                                                @endif>Yes</option>
                                                <option value="No" @if ($item->show_comment=="No")
                                                    selected
                                                @endif>No</option>
                                            </select>
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
