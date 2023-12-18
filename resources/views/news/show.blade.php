@extends('layouts.main')
@section('content')  

    <div class="col col_flex">
        <div class="card shadow-sm">
        <img src="{{ $news->image }}" alt="" width="50%">

            <div class="card-body">
                <h2><?=$news->title?></h2>
                <p class="card-text"><?=$news->description?></p>
                <p class="card-text"><?=$news->author?>(<?=$news->created_at?>)</p>
            </div>
        </div>
    </div>

@endsection