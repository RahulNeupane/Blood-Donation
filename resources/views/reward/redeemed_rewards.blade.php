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
                                    <h4>Reedemed Rewards</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Reward Image</th>
                                            <th>Reward</th>
                                            <th>User</th>
                                            <th>User Contact</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($redeems as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><img src="{{ url('/images/reward/' . $item->rReward->image) }}"
                                                            alt="image" width="50" height="50"></td>
                                                    <td>{{ $item->rReward->title }}</td>
                                                    <td>{{ $item->rUser->name }}</td>
                                                    <td>{{ $item->rUser->phone }}</td>
                                                    <td><a href="{{route('viewmore',$item->rUser->id)}}"><button class="btn btn-success">View User</button></a></td>
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

        $('.delete').on('click', function() {
            const id = this.id;
            $('#deleteModal').attr('action', '{{ route('reward.destroy', '') }}' + '/' + id);
        });
    </script>
@endsection
