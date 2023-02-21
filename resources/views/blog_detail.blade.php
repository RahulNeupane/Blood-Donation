@extends('layouts.home')
@section('content')
    <hr>
    <div class="container" data-aos="fade">
        <div class="row">
            <div class="col-md-12 text-center p-3">
                <h1 class="text-capitalize">{{ $blog->title }}</h1>
            </div>
        </div>
    </div>
    <div class="page-content blog-detail" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="photo">
                        <img src="{{ url(asset('images/blogs/' . $blog->photo)) }}">
                    </div>
                    <div class="sub d-flex justify-content-start flex-column">
                        <div class="author"><span>By:</span> Admin</div>
                        <div class="date"><span>On:</span> {{ $blog->created_at->format('F d,y') }}</div>
                        <div class="category"><span>Category:</span> <a
                                href="{{ route('category', $blog->blog_category_id) }}">{{ $blog->rBlogCategory->category_name }}</a>
                        </div>
                    </div>
                    <div class="text mt-3">
                        <p>
                            {!! nl2br($blog->description) !!}
                        </p>
                    </div>

                    <div class="share">
                        <script type="text/javascript"
                            src="https://platform-api.sharethis.com/js/sharethis.js#property=633263d3bfbc4500128cca2f&product=inline-share-buttons"
                            async="async"></script>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                    @if ($blog->show_comment == 'Yes')
                        <div class="comment">
                            <h2>{{ $count }} Comments</h2>
                            @foreach ($comments as $item)
                                <div class="comment-section">
                                    <div class="comment-box d-flex justify-content-start">
                                        <div class="left">
                                            @if ($item->photo)
                                                <img src="{{ url(asset('images/user/' . $item->photo)) }}" alt="user"
                                                    class="d-inline-block justify-center">
                                            @else
                                                <img src="{{ url(asset('images/user/default.png')) }}" alt="user"
                                                    class="d-inline-block justify-center">
                                            @endif
                                        </div>
                                        <div class="right">
                                            <div class="name">{{ $item->person_name }}</div>
                                            <div class="date">{{ $item->created_at->format('F d,y') }}</div>
                                            <div class="text">
                                                {!! nl2br($item->person_comment) !!}
                                            </div>
                                            <div class="reply">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-reply'></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($item->rReply as $item2)
                                        @if($item2->status ==1)
                                        <div class="comment-box reply-box d-flex justify-content-start">
                                            <div class="left">
                                                @if ($item->photo)
                                                <img src="{{ url(asset('images/user/' . $item->photo)) }}" alt="user"
                                                    class="d-inline-block justify-center">
                                            @else
                                                <img src="{{ url(asset('images/user/default.png')) }}" alt="user"
                                                    class="d-inline-block justify-center">
                                            @endif
                                            </div>
                                            <div class="right">
                                                <div class="name">{{ $item2->person_name }}</div>
                                                <div class="date">{{ $item->created_at->format('F d,y') }}</div>
                                                <div class="text">
                                                    {!! nl2br($item2->person_comment) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Reply Here</h1>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                    aria-label="Close"><b>X</b></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('reply_submit') }}" method="POST">
                                                    @csrf
                                                    <h2>Leave Your Reply</h2>
                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    <input type="hidden" name="comment_id" value="{{ $item->id }}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name" @if (auth()->user())
                                                                    value="{{ auth()->user()->name }}"
                                                                @endif>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email Address" name="email" @if (auth()->user())
                                                                    value="{{ auth()->user()->email }}"
                                                                @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="mt_40"></div>
                            <form action="{{ route('comment_submit') }}" method="POST">
                                @csrf
                                <h2>Leave Your Comment</h2>
                                <input type="text" name="blog_id" value="{{ $blog->id }}" hidden>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Name"
                                                name="name" @if (auth()->user())
                                                    value="{{ auth()->user()->name }}"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Email Address"
                                                name="email" @if (auth()->user())
                                                value="{{ auth()->user()->email }}"
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <h2>Latest Post</h2>
                            <ul>
                                @foreach ($blogs as $item)
                                    <li><a href="{{ route('blog_detail', $item->id) }}">{{ $item->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="widget">
                            <h2>Categories</h2>
                            <ul>
                                @foreach ($categories as $item)
                                    <li><a href="{{ route('category', $item->id) }}">{{ $item->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
