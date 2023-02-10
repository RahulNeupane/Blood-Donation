@extends('layouts.home')
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-3">
                Category: <h4 class="text-capitalize d-inline"> {{ $category->category_name }}</h4>
            </div>
        </div>
    </div>
    <div class="page-content blog">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card blogg mb-5 shadow-sm">
                            <img src="{{ url(asset('images/blogs/' . $blog->photo)) }}" alt=""
                                class="img-responsive">
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>{{ $blog->title }}</h2>
                                </div>
                                <div class="card-text">
                                    <p>
                                        {!! nl2br(Str::limit($blog->description, 150)) !!}

                                    </p>
                                </div>
                                <a href="{{ route('blog_detail', $blog->id) }}"
                                    class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
