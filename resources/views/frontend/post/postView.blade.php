@extends('frontend.layouts.app')

@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mb-3 mb-md-0">
                    <div class="category-heading">
                        <h4>{{ $post->name }}</h4>
                    </div>
                    <div class="my-3">
                        <h6>{{ $post->category->name . ' / ' . $post->name }}</h6>
                    </div>

                    <div class="card card-shadow mt-3">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>

                    {{-- user comment section --}}
                    <div class="comment-area mt-4">
                        @if (session('message'))
                            <h6 class="alert alert-warning mb-3">
                                {{ session('message') }}
                            </h6>
                        @elseif (session('success_message'))
                            <h6 class="alert alert-success mb-3">
                                {{ session('success_message') }}
                            </h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('comments') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea class="form-control" name="comments_body" id="" rows="3" required></textarea>
                                <button class="btn btn-primary mt-3" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    @forelse ($post->comments as $item)
                        <div class="comment-container card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if ($item->user)
                                        {{ $item->user->name }}
                                    @endif
                                    <small class="ms-3 text-primary">Commented On:
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </small>
                                </h6>
                                <p class="user-comment mb-1">{!! $item->comments_body !!}</p>
                            </div>
                            @if (Auth::check() && Auth::id() == $item->user_id)
                                <div>
                                    {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}

                                    <button class="delete_comment btn btn-danger btn-sm me-2" type="button"
                                        value="{{ $item->id }}">Delete</button>
                                </div>
                            @endif
                        </div>
                    @empty
                        {{-- <div class="card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="m-0">No Comment</h6>
                            </div>
                        </div> --}}
                    @endforelse
                </div>
                <div class="col-md-3">
                    <div class="border card text-center p-2 mb-3 mb-md-0">
                        <h5>Ads goes here</h5>
                    </div>
                    <div class="border card text-center p-2 mb-3 mb-md-0">
                        <h5>Ads goes here</h5>
                    </div>
                    <div class="border card text-center p-2 mb-3 mb-md-0">
                        <h5>Ads goes here</h5>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Post</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_post as $item)
                                <a href="{{ url('tutorial/' . $item->category->slug . '/' . $item->slug) }}"
                                    class="text-decoration-none">
                                    <h6> >{{ $item->name }}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.delete_comment', function() {
                if (confirm('Are you sure you want to delete this comment?')) {

                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                        type: "POST",
                        url: "/comments/delete",
                        data: {
                            'comment_id': comment_id,
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                thisClicked.closest('.comment-container').remove();
                                alert(res.message);
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
