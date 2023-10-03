@extends('layouts.main')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">NEWS CATEGORIES</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                
            @foreach($categories as $n)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" focusable="false">
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text>
                        </svg>

                        <div class="card-body">
                            <h2><?=$n->title?></h2>
                            <p class="card-text"><?=$n->description?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('news.index', $n) }}">Show news</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection
