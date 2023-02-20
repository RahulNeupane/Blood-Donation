@extends('layouts.app')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Reward Redeems</h4>
                    <button onclick="printReport()" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <th>Sl No.</th>
                            <th>Reward Image</th>
                            <th>Reward</th>
                            <th>User</th>
                            <th>User Contact</th>
                        </thead>
                        <tbody>
                            @forelse ($redeems as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ url('/images/reward/' . $item->rReward->image) }}" alt="image" width="50" height="50"></td>
                                <td>{{ $item->rReward->title }}</td>
                                <td>{{ $item->rUser->name }}</td>
                                <td>{{ $item->rUser->phone }}</td>
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
    function printReport() {
        $('#myTable').printThis();
    }
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection