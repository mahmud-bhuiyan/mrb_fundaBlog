@extends('admin.layouts.master')

@section('title', 'Category Edit')

@section('content')
    <div class="container-fluid px-4">
        <div class="card my-4">
            <div class="card-header">
                <h4 class="">Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/update/' . $category->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="" class="mb-1">Category Name *
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="name" value="{{ $category->name }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Slug *
                            @error('slug')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="slug" value="{{ $category->slug }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Description *
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control form-control-sm" required>{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Image *
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="file" name="image" id="" class="form-control form-control-sm">
                        <img src="{!! asset('uploads/category/' . $category->image) !!}" alt="{!! $category->name !!}" class="d-block rounded mt-3"
                            height="100" width="100" />
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Title
                            @error('meta_title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" id=""
                            class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Description
                            @error('meta_description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_description" v id="" rows="5" class="form-control form-control-sm">{{ $category->meta_description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Keyword
                            @error('meta_keyword')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_keyword" id="" rows="5" class="form-control form-control-sm">{{ $category->meta_keyword }}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="" class="mb-1">Navbar Status
                                @error('navbar_status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="navbar_status"
                                {{ $category->navbar_status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="" class="mb-1">Status
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-sm btn-primary">Update Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
