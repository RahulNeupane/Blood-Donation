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
                                    <h4>Approved Reply</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Post</th>
                                            <th>Comment</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Reply</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($approved as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><a href="{{ route('blog_detail', $item->rBlog->id) }}"
                                                            target="_blank">{{ $item->rBlog->title }}</a></td>
                                                    <td>{{ $item->rComment->person_name }}: {{ $item->rComment->person_comment }}
                                                        <br>
                                                        {{ $item->rComment->person_email }}</td>
                                                    <td>{{ $item->person_name }}</td>
                                                    <td>{{ $item->person_email }}</td>
                                                    <td>{{ $item->person_comment }}</td>
                                                    <td>
                                                        <a href="{{ route('recheck_reply', $item->id) }}"><button
                                                                class="btn btn-primary">Re-Check</button></a>
                                                        <button type="button" class="btn btn-danger delete"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            id="{{ $item->id }}">
                                                            <a href="{{ route('delete_reply', $item->id) }}"
                                                                class="text-white">Delete</a>
                                                        </button>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection