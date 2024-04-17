@extends('layouts.app')

@section('content')
    <h1>Campaigns</h1>
    <ul>
        @foreach($campaigns as $campaign)
            <li>{{ $campaign->name }} - {{ $campaign->description }}</li>
        @endforeach
    </ul>
@endsection
