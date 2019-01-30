@extends('layouts.app')

@section('title')
    Klassen
@endsection

@section('content')
    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <form action="{{ url('/classes') }}" method="post" style="width: 100%; text-align: right">
            {{ csrf_field() }}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" value="{{ $search['name'] ?? '' }}" type="text" onabort="this.form.submit()" name="name" id="name">
                <label class="mdl-textfield__label" for="name">Naam...</label>
            </div>
            <span class="mdl-switch__label" style="padding-right: 30px">Naam</span>
            <label for="switch1" class="mdl-switch mdl-js-switch mdl-js-ripple-effect" style="width: 0">
                <input {{ empty($search['sort']) ? '' : 'checked' }} type="checkbox" name="sort" id="switch1" onchange="this.form.submit()" class="mdl-switch__input">
            </label>
            <span class="mdl-switch__label" style="padding-right: 30px">Leerlingen</span>
        </form>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Naam</th>
                <th>Slug</th>
                <th>Leerlingen</th>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{ $class->name }}</td>
                    <td>{{ $class->slug }}</td>
                    <td>{{ $class->pupils ?? 15 }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $classes->links('vendor.pagination.material') }}
    </div>
@endsection
