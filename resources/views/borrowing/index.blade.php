@extends('layouts.app')

@section('content')
    <div class="container-fluid side">
        <nav class="nav nav-tabs">
            <a class="nav-link nav-link-color" href="{{ route('home') }}">หน้าแรก</a>
            <a class="nav-link nav-link-color" href="{{ route('employees.index') }}">จัดการพนักงาน</a>
            <a class="nav-link nav-link-color" href="{{ route('equipments.index') }}">จัดการอุปกรณ์</a>
            <a class="nav-link nav-link-color" href="{{ route('withdraws.index') }}">เบิกอุปกรณ์</a>
            <a class="nav-link nav-link-color active" href="{{ route('borrowings.index') }}">ยืมอุปกรณ์</a>
        </nav>
    </div>

    <div class="container mt-5 ">

        <table class="table table-striped table-hover">
            <thead>
                <th>ลำดับ</th>
                <th>อุปกรณ์</th>
                <th>ผู้เบิก</th>
                <th>เวลายม</th>
                <th>เวลาคน</th>
                <th>การอนุญาติ</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </thead>
            <tbody>
                @foreach ($borrowings as $key => $borrowing)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $borrowing->equipment_name }}</td>
                        <td>{{ $borrowing->user->name }}</td>
                        <td>{{ $borrowing->borrow_date }}</td>
                        <td>{{ $borrowing->remand_date }}</td>
                        <td>
                            @if ($borrowing->approve == 1)
                                อนุญาติ
                            @else
                                ไม่อนุญาติ
                            @endif
                        </td>
                        <td>
                            @if ($borrowing->stetus == 1)
                                เบิกแล้ว
                            @else
                                ยังไม่เบิก
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-outline-warning"
                                href="{{ route('borrowings.edit', ['borrowing' => $borrowing->borrow_id]) }}">แก้ไข</a>
                            <button class="btn btn-outline-danger"
                                onclick="deleteBow({{ $borrowing->borrow_id }})">ลบ</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function deleteBow(id) {

            $.ajax({
                type: "DELETE",
                url: "{{ url('borrowings') }}/" + id,
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
