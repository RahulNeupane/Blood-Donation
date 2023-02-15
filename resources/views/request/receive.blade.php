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
                                    <h4>Receive Request(s)</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Group</th>
                                                <th>Requisition Form</th>
                                                <th>Approval</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requests as $request)
                                                @foreach ($request->receivers as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->age }}</td>
                                                        <td>{{ $item->group }}</td>
                                                        <td><img src="{{ url('/images/requisitionForm/' . $item->image) }}"
                                                                alt="image" width="50" height="50"></td>
                                                        <td><a href="{{ route('receiveRequestAccept', $item->id) }}"><button
                                                                    class="btn btn-primary">Approve</button></a></td>
                                                        <td><a href="{{ route('receiveRequestDelete', $item->id) }}"><button
                                                                    class="btn btn-danger">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 m-auto ">
                <div class="section-body justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-center mb-3">
                                    <h4>Accepted Receive Request(s)</h4>
                                </div>
                                @if (session()->has('fail'))
                                    <div class="alert alert-danger text-center">
                                        <p class="text-white">{{ session('fail') }}</p>
                                    </div>
                                @endif
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Group</th>
                                            <th>Requisition Form</th>
                                            <th>Approval</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($accepted_requests as $request)
                                                @foreach ($request->receivers as $item)
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->age }}</td>
                                                    <td>{{ $item->group }}</td>
                                                    <td><img src="{{ url('/images/requisitionForm/' . $item->image) }}"
                                                            alt="image" width="50" height="50"></td>
                                                    <td><a href="{{ route('receiveRequestRecheck', $item->id) }}"><button
                                                                class="btn btn-primary">Recheck</button></a></td>
                                                @endforeach
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
