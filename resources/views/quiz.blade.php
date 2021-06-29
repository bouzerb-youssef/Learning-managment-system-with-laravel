@extends('front.layouts.app')

@section('content')
<br><br><br><br>
@livewire('front.take-quiz', ['cource' => $cource])



@endsection
