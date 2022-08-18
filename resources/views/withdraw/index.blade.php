@extends('layouts.app')

@section('content')
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link nav-link-color" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="#">คำร้อง</a>
            <a class="nav-link nav-link-color active" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
        </nav>
    </div>

    <div class="container mt-5 ">
        <div class="text-end mb-2">
            <a href="{{route('withdraws.create')}}" class="btn btn-outline-primary">เบิก</a>
        </div>
        <table class="table">
            <thead>
                <th>#</th>
                <th>อุปกรณ์</th>
                <th>ผู้เบิก</th>
                <th>เวลา</th>
                <th>การอนุญาติ</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@endsection
