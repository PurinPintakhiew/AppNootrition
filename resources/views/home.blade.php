@extends('layouts.app')

@section('content')
<style>

</style>
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link nav-link-color active" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="#">คำร้อง</a>
            <a class="nav-link nav-link-color" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
        </nav>
    </div>

@endsection
