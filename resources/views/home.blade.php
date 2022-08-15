@extends('layouts.app')

@section('content')
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link active" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link" href="#">คำร้อง</a>
        </nav>
    </div>

@endsection
