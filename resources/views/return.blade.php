@extends('layouts.app')

@section('content')
{{-- คำร้อง --}}
<div class="container-fluid side">
    <nav class="nav nav-tabs" >
        <a class="nav-link" href="{{route('home')}}">Home</a>
        <a class="nav-link" href="#">Withdraw</a>
        <a class="nav-link" href="{{route('borrowing')}}">Borrowing</a>
        <a class="nav-link active" href="{{route('return')}}">Return</a>
    </nav>
</div>
<h1>return</h1>

@endsection
