@extends('layouts.app')

@section('title')
    Klassen
@endsection

@section('content')
    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Id</th>
                <th>Activiteit</th>
                <th>Gebruiker</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{ $log->id }}</td>
                    <td>{{ $log->activity }}</td>
                    <td>{{ $log->application_user->app_key }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}
    </div>
@endsection
