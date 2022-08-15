@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-end content-page">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="./index.html"
                        class="text-decoration-none text-info">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">#</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="container mt-5 ">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('image/1.jpg') }}" style="width: 300px;height: 300px" alt="...">
            <div class="content-p p-2">
                <div class="text-center">
                    <h3>รายละเอียดอุปกรณ์</h3>
                </div>
                <h6><strong>ชื่อ : </strong>{{ $equipment->equipment_name }}</h6>
                <div><strong>ประเภท : </strong>
                    @if ($equipment->categories_id != '')
                        {{ $equipment->category->categories_name }}
                    @else
                        -
                    @endif
                </div>
                <div><strong>ที่อยู่อุปกรณ์ : </strong>{{ $equipment->equipment_address }}</div>
                <div><strong>สถานะ : </strong>
                    @if ($equipment->stetus == 0)
                        ว่าง
                    @elseif ($equipment->stetus == 1)
                        ไม่ว่าง
                    @endif
                </div>
            </div>
        </div>
    @endsection
