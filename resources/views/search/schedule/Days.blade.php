@extends('layouts._LayoutDefault')

@section('content')
    <div style="text-align: center">
        @foreach($thisMonth as $days)
            <div>
                <a href="{{ route("schedule.details.day.view", [$mes , $days->isoFormat('D')]) }}">
                    <span> {{ $days->isoFormat("dddd") }}</span>
                    <span> {{ $days->isoFormat("D")}} de {{ $days->isoFormat("MMMM")}}</span>
                </a>
            </div>
        @endforeach
    </div>

@endsection
@section('js')
@endsection