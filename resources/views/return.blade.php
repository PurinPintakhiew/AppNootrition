@extends('layouts.app')

@section('content')
{{-- คำร้อง --}}
<style>
    
</style>
<div class="container-fluid side">
    <nav class="nav nav-tabs" >
        <a class="nav-link nav-link-color" href="{{route('home')}}">หน้าแรก</a>
        <a class="nav-link nav-link-color" href="{{route('employees.index')}}">จัดการพนักงาน</a>
        <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
        <a class="nav-link nav-link-color active" href="{{route('return')}}">คำร้อง</a>
    </nav>
</div>
<h1>return</h1>

@endsection
