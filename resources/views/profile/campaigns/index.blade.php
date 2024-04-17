@extends('layouts.app')

@section('content')
    <h1>Campaigns</h1>
    <ul>
        @foreach($campaigns as $campaign)
            <li>
                <strong>{{ $campaign->name }}</strong> - {{ $campaign->description }}
                <br>Target Donasi : ${{ number_format($campaign->target_donation, 2) }}
            </li>
        @endforeach
    </ul>
@endsection
