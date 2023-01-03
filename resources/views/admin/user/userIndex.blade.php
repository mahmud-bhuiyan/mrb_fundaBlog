@extends('admin.layouts.master')

@section('title', 'User Table')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Users</h4>
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
                            <caption class="text-center" style="font-size: 25px;">List of Users</caption>
                            <thead class="table-info align-middle">
                                <tr>
                                    <th style="width: 5%; text-align: center;">SL</th>
                                    <th style="width: 20%; text-align: center;">Username</th>
                                    <th style="width: 20%; text-align: center;">Email</th>
                                    <th style="width: 20%; text-align: center;">Role</th>
                                    <th style="width: 20%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="table">
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role_as == '0' ? 'User' : 'Admin' }}</td>
                                        <td>
                                            <a href="{{ url('admin/user/edit/' . $item->id) }}"
                                                class="btn btn-sm btn-primary"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
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
