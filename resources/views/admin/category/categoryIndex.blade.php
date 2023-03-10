@extends('admin.layouts.master')

@section('title', 'Category')

@section('content')
    <!-- deleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/category/delete') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category with its posts</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_delete_id" id="category_id">
                        <h5>Are you sure you want to delete category with its post?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- deleteModal -->

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Category
                    <a href="{{ url('admin/category/add') }}" class="btn btn-sm btn-primary float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- search --}}
                {{-- <input type="text" name="search" id="search" class="mt-3 form-control" placeholder="Seach here"> --}}
                <div class="table-responsive">
                    <div class="table-data">
                        <table id="myDataTable"
                            class="table table-primary table-striped table-hover table-bordered text-center caption-top align-middle">
                            <caption class="text-center" style="font-size: 25px;">List of Categories</caption>
                            <thead class="table-info align-middle">
                                <tr>
                                    <th style="width: 5%; text-align: center;">SL</th>
                                    <th style="width: 20%; text-align: center;">Category Name</th>
                                    <th style="width: 10%; text-align: center;">Image</th>
                                    <th style="width: 20%; text-align: center;">Status</th>
                                    <th style="width: 20%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="table">
                                @foreach ($category as $key => $item)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/category/' . $item->image) }}"
                                                alt="{{ $item->image }}" width="50px">
                                        </td>
                                        <td>{{ $item->status == '0' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/edit/' . $item->id) }}"
                                                class="btn btn-sm btn-primary"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>

                                            {{-- <a href="{{ url('admin/category/delete/' . $item->id) }}"
                                            class="btn btn-sm btn-danger delete_product" data-id="{{ $item->id }}"><i
                                                class="fa-regular fa-trash-can"></i></a> --}}
                                            <button class="btn btn-sm btn-danger deleteCategoryBtn" type="submit"
                                                value="{{ $item->id }}"><i class="fa-regular fa-trash-can"></i></button>
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
@endsection


@section('scripts')
    {{-- deleteCategoryBtn --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteCategoryBtn', function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                $('#category_id').val(category_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
