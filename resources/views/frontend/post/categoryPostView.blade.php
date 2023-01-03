@extends('frontend.layouts.app')

@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keyword', "$category->meta_keyword")

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mb-4 mb-md-0">
                    <div class="category-heading">
                        <h4>{{ $category->name }}</h4>
                    </div>
                    @forelse ($post as $postitem)
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <a href="{{ $category->slug . '/' . $postitem->slug }}"
                                    class="text-decoration-none">
                                    <h2 class="post-heading">{{ $postitem->name }}</h2>
                                </a>
                                <h6>Posted On: {{ $postitem->created_at->format('d-M-Y') }}
                                    <span class="ms-3">Posted By: {{ $postitem->user->name }}</span>
                                </h6>
                            </div>
                        </div>
                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h1>No Post Available!</h1>
                            </div>
                        </div>
                    @endforelse
                    <div class="your-paginate">
                        {{ $post->links() }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border card text-center p-2">
                        <h5>Ads goes here</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
