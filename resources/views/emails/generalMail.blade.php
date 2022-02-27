@extends('layouts.mail')

@section('content')
<section style="margin: 10px">
    <h3>{{ $details['title'] }}</h3>
    <p>{{ $details['body'] }}</p>
    <p>Thank you</p>
</section>
@endsection
