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
                                    <h4>All Events</h4>
                                    <div>
                                        <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                                    </div>
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
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td width="40%">{{ $event->body }}</td>
                                                    <td><img src="{{ url('/images/events/' . $event->image) }}" alt="event"
                                                            width="50"></td>
                                                    <td style="color: {{date('Y-m-d H:i:s')<$event->date?'green':'red'}}">{{$event->date }}</td>
                                                    <td>
                                                        <a href="{{ route('events.show', $event->id) }}"><button
                                                                class="btn btn-success">view</button></a>
                                                        <a href="{{ route('events.edit', $event->id) }}"><button
                                                                class="btn btn-primary">Edit</button></a>
                                                        <button type="button" class="btn btn-danger delete"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            id="{{ $event->id }}">
                                                            Delete
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="deleteModal" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h5>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $('.delete').on('click',function(){
            const id = this.id;
            $('#deleteModal').attr('action','{{route("events.destroy","")}}'+'/'+id);
        });
    </script>
@endsection
