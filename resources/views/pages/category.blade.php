@extends('layouts.lead')

@section('keywords')
    <meta name="keywords" content="{{ $keywords }}">
@endsection

@section('content')

    <!-- Page header with logo and tagline-->
    <header class="py-2 bg-light mb-4">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bolder">Categories | {{ $category->name }}</h1>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">

                <div class="d-flex justify-content-center">
                    <!-- Blog posts-->
                    <div class="row">
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <!-- Blog post-->
                                    <div class="card mb-4">
                                        <a href="/posts/{{ $post->id }}"><img class="card-img-top"
                                                src="{{ asset('storage/images/post_covers/' . $post->cover_image) }}"
                                                alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted">{{ $post->created_at->toDayDateTimeString() }}
                                            </div>
                                            <h2 class="card-title h4">{{ $post->title }}</h2>
                                            <p class="card-text">{!! substr($post->body, 0, 15) . '...' !!}</p>
                                            <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more →</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Pagination-->
                            <hr class="my-2" />
                            <div class="d-flex justify-content-center">{{ $posts->links() }}</div>
                        @else
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">No posts in this category yet!</div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
