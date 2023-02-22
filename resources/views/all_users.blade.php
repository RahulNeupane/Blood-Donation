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
                                    <h4>All Users</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Phone</th>
                                            <th>Last Seen</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td><img src="{{ url('/images/user/' . $user->image) }}" alt="user"
                                                            width="50"></td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        @if (Cache::has('user-is-online-' . $user->id))
                                                            <span class="text-success">Online</span>
                                                        @else
                                                            <span class="text-secondary">Offline</span>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ route('viewmore', $user->id) }}"><button
                                                                class="btn btn-success">view</button></a></td>
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
