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
                                    <h4>All Categories</h4>
                                    <div>
                                        <a href="{{ route('blogCategory.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <th>Sl No.</th>
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($all_data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>
                                                        <a href="{{ route('blogCategory.edit', $item->id) }}"><button
                                                                class="btn btn-primary">edit</button></a>
                                                        <button type="button" class="btn btn-danger delete"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            id="{{ $item->id }}">
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
            $('#deleteModal').attr('action','{{route("blogCategory.destroy","")}}'+'/'+id);
        });
    </script>
@endsection
