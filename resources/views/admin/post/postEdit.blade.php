@extends('admin.layouts.master')

@section('title', 'Post Edit')

@section('content')
    <div class="container-fluid px-4">
        <div class="card my-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $errors)
                        <div>{{ $errors }}</div>
                    @endforeach
                </div>
            @endif
            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/post') }}" class="btn btn-sm btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/post/update/' . $post->id) }}" method="post">
                    @csrf

                    <div class="mb-2">
                        <label for="">Category *</label>
                        <select required name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ $post->category_id == $item->id ? 'selected':'' }}
                                    >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Name *
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="name" value="{{ $post->name }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Slug *
                            @error('slug')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="slug" value="{{ $post->slug }}" id=""
                            class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Description *
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="description" id="my_summernote" rows="5" class="form-control form-control-sm" required>{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Youtube Iframe
                            @error('yt_iframe')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="yt_iframe" id="" rows="5" class="form-control form-control-sm">{!! $post->yt_iframe !!}</textarea>
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Title
                            @error('meta_title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" id=""
                            class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Description
                            @error('meta_description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_description" id="" rows="5" class="form-control form-control-sm">{!! $post->meta_description !!}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="mb-1">Meta Keyword
                            @error('meta_keyword')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <textarea name="meta_keyword" id="" rows="5" class="form-control form-control-sm">{!! $post->meta_keyword !!}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="" class="mb-1">Status
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </label>
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-sm btn-primary float-end">Update Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
