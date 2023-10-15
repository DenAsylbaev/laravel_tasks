@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">
    @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">email</th>
                <th scope="col">Права администратора</th>

            </tr>
            </thead>
            <tbody>
            @forelse($users as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                    @csrf
                        <input 
                            id="toggle-class"
                            data-id="{{$users->id}}" 
                            class="toggle-class" 
                            type="checkbox" {{ $users->is_admin ? 'checked' : '' }}>
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

@push('scripts')
    <script>
            let adminStatusChangeElement = document.querySelectorAll(".toggle-class");
            adminStatusChangeElement.forEach(function (element) {

                element.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');
                    if (this.checked) {
                        send(`/admin/users/update/${id}`, '1')
                            .then( () => {
                                console.log('checked');
                            });
                    } else {
                        send(`/admin/users/update/${id}`, '0')
                            .then( () => {
                                console.log('not checked');
                            });                    
                    }
                });
            });

            async function send(url, status) {
                let response = await fetch (url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({'status': status})
                });

                let result = await response.json();
                return result.ok;
            }
    </script>
@endpush




