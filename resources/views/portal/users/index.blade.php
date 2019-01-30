@extends('layouts.app')

@section('title')
    Klassen
@endsection

@section('content')
    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Key</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{ $user->app_key }}</td>
                    <td>{{ $user->created_at }}</td>
                    {{--<td>{{ $user->pupils ?? 15 }}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links('vendor.pagination.material') }}
    </div>
@endsection
