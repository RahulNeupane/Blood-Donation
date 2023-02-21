@extends('layouts.home')
@section('content')
    <hr>
    <div class="page-content blog">
        <div class="container mt-5">
            <div class="text-center">
                <h1>Our Blogs</h1>
                <div class="d-flex justify-content-center  ">
                    <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                            style="height: 3px;width: 13.5vh;"> </div>
                    <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                            style="height: 21px;width: 21px;"> </div>
                    <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                            style="height: 3px;width: 13.5vh;"> </div>
                </div><br><br>
            </div>
            <div class="d-flex justify-content-end mb-5">
                <form action="{{ route('blog_search') }}" method="GET" role="search">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="search blog" class="form-control me-1" name="search">
                        <button class="btn btn-primary" type="submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
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
                                <a href="{{ route('blog_detail',$blog->id) }}" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
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
