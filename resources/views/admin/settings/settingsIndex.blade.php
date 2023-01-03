@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid px-4">

        <div class="row my-3">
            <div class="col-md-12">
                @if (session('message'))
                    <h6 class="alert alert-success">{{ session('message') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Website Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/settings') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-2">
                                <label>Website Name *</label>
                                <input type="text" class="form-control" name="website_name"
                                    @if ($setting) value="{{ $setting->website_name }}" @endif required>
                            </div>

                            <div class="mb-2">
                                <label>Website Logo *</label>
                                <input type="file" class="form-control" name="logo" required>

                                @if ($setting)
                                    <img src="{!! asset('uploads/settings/' . $setting->logo) !!}" alt="{!! $setting->website_name !!}"
                                        class="d-block rounded mt-3" height="100" width="100" />
                                @endif
                            </div>

                            <div class="mb-2">
                                <label>Website Favicon</label>
                                <input type="file" class="form-control" name="favicon">

                                @if ($setting)
                                    <img src="{!! asset('uploads/settings/' . $setting->favicon) !!}" alt="{!! $setting->website_name !!}"
                                        class="d-block rounded mt-3" height="100" width="100" />
                                @endif
                            </div>

                            <div class="mb-2">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">
@if ($setting)
{{ $setting->description }}
@endif
</textarea>
                            </div>

                            <h4>SEO - Meta Tags</h4>
                            <div class="mb-2">
                                <label class="mb-1">Meta Title *</label>
                                <input required type="text" name="meta_title"
                                    @if ($setting) value="{{ $setting->meta_title }}" @endif
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-2">
                                <label class="mb-1">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control form-control-sm">
@if ($setting)
{{ $setting->meta_description }}
@endif
</textarea>
                            </div>
                            <div class="mb-2">
                                <label class="mb-1">Meta Keyword
                                </label>
                                <textarea name="meta_keyword" rows="3" class="form-control form-control-sm">
@if ($setting)
{{ $setting->meta_keyword }}
@endif
</textarea>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
