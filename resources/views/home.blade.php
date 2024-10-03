@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ласкаво просимо до Футбольного Клубу</h1>
    <ul>
        <li><a href="{{ route('teams.index') }}">Команди</a></li>
        <li><a href="{{ route('players.index') }}">Гравці</a></li>
        <li><a href="{{ route('coaches.index') }}">Тренери</a></li>
        <li><a href="{{ route('matches.index') }}">Матчі</a></li>
        <li><a href="{{ route('stadiums.index') }}">Стадіони</a></li>
        <li><a href="{{ route('sponsors.index') }}">Спонсори</a></li>
    </ul>
</div>
@endsection