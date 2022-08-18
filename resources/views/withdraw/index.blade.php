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
            <a href="{{ route('withdraws.create') }}" class="btn btn-outline-primary">เบิก</a>
        </div>
        <table class="table table-striped table-hover">
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
                @foreach ($withdraws as $key => $withdraw)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $withdraw->equipment_name }}</td>
                        <td>{{ $withdraw->user->name }}</td>
                        <td>{{ $withdraw->date }}</td>
                        <td>
                            @if ($withdraw->approve == 1)
                                อนุญาติ
                            @else
                                ไม่อนุญาติ
                            @endif
                        </td>
                        <td>
                            @if ($withdraw->stetus == 1)
                                เบิกแล้ว
                            @else
                                ยังไม่เบิก
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-outline-warning"
                                href="{{ route('withdraws.edit', ['withdraw' => $withdraw->withdraw_id]) }}">แก้ไข</a>
                            <button class="btn btn-outline-danger"
                                onclick="delWithdraws({{ $withdraw->withdraw_id }})">ลบ</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function delWithdraws(id) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('withdraws') }}/" + id,
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
