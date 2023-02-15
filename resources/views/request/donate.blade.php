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
                                    <h4>Donate Request(s)</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Approval</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($requests as $request)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $request->users[0]->name }}</td>
                                                    <td>{{ $request->users[0]->phone }}</td>
                                                    <td><a href="{{ route('donateRequestAccept', $request->userid) }}"><button
                                                                class="btn btn-primary">Approve</button></a></td>
                                                    <td><a href="{{ route('viewmore', $request->userid) }}"><button
                                                                class="btn btn-success">view</button></a></td>
                                                </tr>
                                            @empty
                                                <td colspan="5" class="text-center">no current requests</td>
                                            @endforelse
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
                                    <h4>Accepted Donate Request(s)</h4>
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
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($accepted_requests as $accepted_request)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $accepted_request->users[0]->name }}</td>
                                                    <td>{{ $accepted_request->users[0]->phone }}</td>
                                                    <td>{{ $accepted_request->users[0]->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('viewmore', $accepted_request->userid) }}"><button
                                                                class="btn btn-success">view</button></a>
                                                        <a
                                                            href="{{ route('updateRewardPoints', $accepted_request->userid) }}"><button
                                                                class="btn btn-primary">update reward point</button></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="5" class="text-center">no approved requests</td>
                                            @endforelse
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