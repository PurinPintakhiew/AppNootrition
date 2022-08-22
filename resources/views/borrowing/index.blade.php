@extends('layouts.app')

@section('content')
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link nav-link-color" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
            <a class="nav-link nav-link-color active" href="{{ route('borrowings.index') }}">ยืมอุปกรณ์</a>
        </nav>
    </div>

    <div class="container mt-5 ">
        <div class="text-end">
            <a href="{{ route('borrowings.create') }}" class="btn btn-outline-primary">ยืมอุปกรณ์</a>
        </div>
    </div>
@endsection