@extends('layouts.app')

@section('content')
{{-- จัดการอุปกรณ์ --}}
<div class="container-fluid side">
    <nav class="nav nav-tabs" >
        <a class="nav-link" href="{{route('home')}}">Home</a>
        <a class="nav-link" href="{{route('employees.index')}}">Withdraw</a>
        <a class="nav-link active" href="{{route('borrowing')}}">Borrowing</a>
        <a class="nav-link" href="{{route('return')}}">Return</a>
    </nav>
</div>
<h1>borrowing</h1>

@endsection
