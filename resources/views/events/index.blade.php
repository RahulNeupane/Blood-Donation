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
                                <h4>All Events</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <th>Sl No.</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($events as $event)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$event->title}}</td>
                                            <td>{{$event->body}}</td>
                                            <td><img src="{{url('/images/events/'.$event->image)}}" alt="event" width="50" ></td>
                                            <td>{{$event->date}}</td>
                                            <td><a href="{{route('viewmore',$event->id)}}"><button class="btn btn-success">view</button></a></td>
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