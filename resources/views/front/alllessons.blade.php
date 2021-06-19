@extends('front.layouts.app')
@section('content')
<br><br><br><br>
@livewire('vediolesson', ['cource' => $cource])

@endsection