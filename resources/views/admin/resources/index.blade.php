@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников новостей</h1>
    </div>
    
    <div class="table-responsive">
    @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">url</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $resources)
                <tr>
                    <td>{{ $resources['id'] }}</td>
                    <td>{{ $resources['url'] }}</td>
                    <td>
                        <a href="{{ route('admin.resources.destroy', $resources) }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
