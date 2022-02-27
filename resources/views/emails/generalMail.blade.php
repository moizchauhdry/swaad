@extends('layouts.mail')

@section('content')
<section style="margin: 12px">
    <h3>{{ $details['title'] }}</h3>
    <p>{{ $details['body'] }}</p>
</section>
@endsection
