
@extends('layouts.main')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">NEWS</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                
            @foreach($news as $n)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <img src="{{ $n->image }}" alt="" width="100%">
                            <h2><?=$n->title?></h2>
                            <p class="card-text"><?=$n->description?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('news.show', $n) }}">Show news</a>
                            </div>
                            <p class="card-text"><?=$n->author?>(<?=$n->created_at?>)</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    {{ $news->links() }}

@endsection
