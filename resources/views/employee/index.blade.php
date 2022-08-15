@extends('layouts.app')

@section('content')
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link active" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link" href="#">คำร้อง</a>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="text-end mb-2">
            <a href="{{route('employees.create')}}"  class="btn btn-outline-primary">เพิ่มผู้ใช้</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
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
                        <td>{{ $employee->department_id }}</td>
                        <td>{{ $employee->telephone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <a class="btn btn-outline-warning" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">แก้ไข</a>
                            <button class="btn btn-outline-danger" onclick="delEmployee({{$employee->id}})">ลบ</button>
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
