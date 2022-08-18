@extends('layouts.app')

@section('content')
<style>
    
</style>
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
<<<<<<< HEAD
            <a class="nav-link active" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link" href="#">คำร้อง</a>
            <a class="nav-link" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
            <a class="nav-link" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
=======
            <a class="nav-link nav-link-color active" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="#">คำร้อง</a>
>>>>>>> 45a667f55cc95b2392ddb79973b1ee953a6b6d97
        </nav>
    </div>

@endsection
