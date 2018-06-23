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
                <th>Value</th>
                <th>Key</th>
            </tr>
            </thead>
            <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{ $setting->id }}</td>
                    <td>
                        <form method="post" action="{{ url('/settings') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $setting->id }}"/>
                            <input step=".1" onabort="this.form.submit()" style="width: 40px" type="number" name="value" value="{{ $setting->value }}"/>
                        </form>
                    </td>
                    <td>{{ $setting->key }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
