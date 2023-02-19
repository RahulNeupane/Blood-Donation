@extends('layouts.app')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Donations</h4>
                        <button onclick="printReport()" class="btn btn-primary"><i class="fas fa-print"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donate as $accepted_request)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $accepted_request->users[0]->name }}</td>
                                        <td>{{ $accepted_request->users[0]->phone }}</td>
                                        <td>{{ $accepted_request->updated_at }}</td>
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

@section('scripts')
    <script src="{{asset('assets/js/printThis.js')}}"></script>
    <script>
        function printReport(){
            $('#myTable').printThis();
        }
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
