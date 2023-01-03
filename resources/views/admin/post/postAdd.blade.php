@extends('admin.layouts.master')

@section('title', 'Post Add')

@section('content')
    <div class="container-fluid px-4">
        <div class="card my-4">
            <div class="card-header">
                <h4 class="">Add Post</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/post/add') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Post Name *
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
                        <label for="" class="mb-1">Youtube Iframe Link *
                            @error('yt_iframe')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="yt_iframe" value="{{ old('yt_iframe') }}" id="" class="form-control form-control-sm">
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

                    <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="" class="mb-1">Status
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-sm btn-primary float-end">Add Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
