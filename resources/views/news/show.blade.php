@extends('layouts.main')
@section('content')  

    <div class="col col_flex">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" focusable="false">
                <rect width="100%" height="100%" fill="#55595c"/>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text>
            </svg>

            <div class="card-body">
                <h2><?=$news->title?></h2>
                <p class="card-text"><?=$news->description?></p>
                <p class="card-text"><?=$news->author?>(<?=$news->created_at?>)</p>

            </div>
        </div>
    </div>

@endsection