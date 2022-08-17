@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-end mb-2">
            <a href="{{ route('departments.create') }}" class="btn btn-outline-primary">เพิ่มแผนก</a>
        </div>
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อแผนก</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $key => $department)
                    <tr>
                        <td >{{ $key + 1 }}</td>
                        <td>{{ $department->department_name  }}</td>
                        <td>
                            <a class="btn btn-outline-warning" href="{{ route('departments.edit', ['department' => $department->department_id]) }}">แก้ไข</a>
                            <button class="btn btn-outline-danger" onclick="delDepartment({{$department->department_id}})">ลบ</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function delDepartment(id) {

            $.ajax({
                type: "DELETE",
                url: "{{ url('departments') }}/" + id,
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
