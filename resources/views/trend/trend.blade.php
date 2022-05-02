@extends('trend.trend')

@section('content')
<h1>{{ $title }}</h1>
<ul>
  @foreach ($messages as $message)
    @if (mb_strlen($message) >= 5)
      <li>{{ $message }}</li>
    @endif
  @endforeach
</ul>
@endsection
