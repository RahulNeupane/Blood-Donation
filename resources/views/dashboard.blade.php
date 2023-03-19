@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Unchecked Donation Requests</h4>
                    </div>
                    <div class="card-body">
                        {{ $donor_count }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Unchecked Blood Requests</h4>
                    </div>
                    <div class="card-body">
                       {{ $blood_request_count }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $users }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Recent Donate Requests</h4>
                    <div>
                        <a href="{{ route('donateReports') }}" class="btn btn-primary"> View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donate as $accepted_request)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $accepted_request->users[0]->name }}</td>
                                    <td>{{ $accepted_request->users[0]->group }}</td>
                                    <td>{{ $accepted_request->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Recent Blood Requests</h4>
                    <div>
                        <a href="{{ route('receiveReports') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receive as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->group }}</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
