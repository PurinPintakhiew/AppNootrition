@extends('layouts.app')

@section('content')
    <style>
        
    </style>
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link nav-link-color" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color active" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="#">คำร้อง</a>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="text-end mb-2">
            <a href="{{ route('employees.create') }}" class="btn btn-outline-primary">เพิ่มผู้ใช้</a>
            <a href="{{ route('departments.index') }}" class="btn btn-outline-primary">จัดการแผนก</a>
        </div>
        <table class="table table-hover ">
            <thead class="table-dark">
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>แผนก</th>
                    <th>เบอร์</th>
                    <th>อีเมล</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $employee)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>
                            @if ($employee->department_id != '')
                                {{ $employee->department->department_name }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $employee->telephone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <a class="btn btn-outline-info"
                                href="{{ route('employees.edit', ['employee' => $employee->id]) }}">แก้ไข</a>
                            <button class="btn btn-outline-danger" onclick="delEmployee({{ $employee->id }})">ลบ</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function delEmployee(id) {

            $.ajax({
                type: "DELETE",
                url: "{{ url('employees') }}/" + id,
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
