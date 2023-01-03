@extends('frontend.layouts.app')

@section('title', "$setting->website_name")
@section('meta_description', "$setting->meta_description")
@section('meta_keyword', "$setting->meta_keyword")

@section('content')
    <div class="py-3">
        <div class="bg-danger py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme category-carousel">
                            @foreach ($all_categories as $all_items)
                                <div class="item">
                                    <a href="{{ url('tutorial/' . $all_items->slug) }}" class="text-decoration-none">
                                        <div class="card">
                                            <img src="{{ asset('uploads/category/' . $all_items->image) }}" alt="image">
                                            <div class="card-body text-center">
                                                <h6>{{ $all_items->name }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 bg-gray">
        <div class="container">
            <div class="text-center pt-3 pb-2">
                <h6>Ads goes here</h6>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>MRB@Blog</h4>
                    <div class="underline"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore possimus quod ad ab vero est numquam
                        excepturi. Necessitatibus assumenda, labore ullam laborum consectetur molestiae sequi alias sunt
                        voluptate, minus neque?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur illum ullam soluta sit
                        voluptatibus optio eveniet adipisci iure debitis, asperiores vitae doloremque cupiditate nesciunt
                        maiores cum incidunt perferendis. Iste, sunt.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories</h4>
                    <div class="underline"></div>
                </div>
                @foreach ($all_categories as $all_items)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorial/' . $all_items->slug) }}" class="text-decoration-none">
                                <h6 class="text-dark mb-0">{{ $all_items->name }}</h6>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-8">
                    @foreach ($latest_posts as $post_items)
                        <div class="card card-body bg-gray mb-3">
                            <a href="{{ url('tutorial/' . $post_items->category->slug . '/' . $post_items->slug) }}"
                                class="text-decoration-none">
                                <h6 class="text-dark mb-0">{{ $post_items->name }}</h6>
                                <p class="m-0 time">Posted On: {{ $post_items->created_at->format('d-M-Y') }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border card text-center pt-3 pb-2">
                        <h6>Ads goes here</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
