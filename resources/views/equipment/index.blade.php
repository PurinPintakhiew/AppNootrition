@extends('layouts.app')

@section('content')
<div class="container-fluid side">
    <nav class="nav nav-tabs">
        <a class="nav-link" href="{{ route('home') }}">หน้าแรก</a>
        <a class="nav-link" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
        <a class="nav-link active"  href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
        <a class="nav-link" href="{{ route('return') }}">คำร้อง</a>
    </nav>
</div>
    <div class="container mt-3">
        <div class="text-end">
            <a href="{{ route('equipments.create') }}" class="btn btn-outline-primary">เพิ่มอุปกรณ์</a>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-warning">จัดการประเภท</a>
        </div>
        <div class="row">
            @foreach ($equipments as $equipment)
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <img src="{{ asset('image/1.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $equipment->equipment_name }}</h5>
                            <div class="card-text"><strong>ที่อยู่: </strong> {{ $equipment->equipment_address }}
                            </div>
                            <div class="card-text"><strong>วันที่ซื้อ: </strong> {{ $equipment->buy_date }}</div>
                            <div class="card-text"><strong>สถานะ: </strong> {{ $equipment->stetus }}</div>
                            <div class="card-text"><strong>จำนวน: </strong> {{ $equipment->qty }}</div>
                            @if ($equipment->categories_id != '')
                                <div class="card-text"><strong>ประเภท: </strong> {{ $equipment->category->categories_name }}
                                </div>
                            @endif
                            <div class="text-end">
                                <a href="{{ route('equipments.show', ['equipment' => $equipment->equipment_id]) }}"
                                    class="btn btn-outline-success">ดู</a>
                                <a href="{{ route('equipments.edit', ['equipment' => $equipment->equipment_id]) }}"
                                    class="btn btn-outline-info">แก้ไข</a>
                                <button class="btn btn-outline-danger"
                                    onclick="delEquipments({{ $equipment->equipment_id }})">ลบ</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function delEquipments(id) {

            $.ajax({
                type: "DELETE",
                url: "{{ url('equipments') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    if (response) {
                        if (response == "success") {
                            alert('success');
                            location.reload();
                        } else if (response == "fail") {
                            alert('fail');
                        }
                    }
                }
            });
        }
    </script>
@endsection
