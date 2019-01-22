@extends('layouts._LayoutDefault')

@section('content')
<div class="div-center-schedule">
    @foreach($months as $month)
        <div class="div-day shadow-sm">
            <div class="date-schedule">
                <a href="{{ route("schedule.month.view", $month->isoFormat("MMMM"))}}">{{ $month->isoFormat("MMMM") }}</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
@section('js')
@endsection