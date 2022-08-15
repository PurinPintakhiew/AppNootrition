@extends('layouts.app')

@section('content')
<style>
    .nav-link{
        color:#000000;
    }
    .nav-link:hover{
        background-color:#000000;
        color:#FFFFFF;
    }
    .nav-link:active{
        background-color:#949393;
        color:#000000;
    }
</style>
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link active" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link" href="#">คำร้อง</a>
        </nav>
    </div>

@endsection
