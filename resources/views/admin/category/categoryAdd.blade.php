@extends('admin.layouts.master')

@section('title', 'Category Add')

@section('content')
    <div class="container-fluid px-4">
        <div class="card my-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.add_category') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="" class="mb-1">Category Name *
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Slug *
                            @error('slug')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="slug" value="{{ old('slug') }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Description *
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="description" value="{{ old('description') }}" id="my_summernote" rows="5"
                            class="form-control form-control-sm" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Image *
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input required type="file" name="image" id="" class="form-control form-control-sm">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Title
                            @error('meta_title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" id=""
                            class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Description
                            @error('meta_description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_description" value="{{ old('meta_description') }}" id="" rows="5"
                            class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Keyword
                            @error('meta_keyword')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_keyword" value="{{ old('meta_keyword') }}" id="" rows="5"
                            class="form-control form-control-sm"></textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="" class="mb-1">Navbar Status
                                @error('navbar_status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="" class="mb-1">Status
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
