@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>ประเภท</th>
                    <th>สถานะ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $key => $equipment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $equipment->equipment_name }}</td>
                        <td>
                            @if ($equipment->categories_id != '')
                                <div class="card-text"> {{ $equipment->category->categories_name }}
                                </div>
                            @else
                                <div class="card-text">ไม่ระบุประเภท</div>
                            @endif
                        </td>
                        <td>{{ $equipment->stetus }}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{route('borrowings.create',['id'=>$equipment->equipment_id])}}">ยืม</a>
                            <a href="{{ route('equipments.show', ['equipment' => $equipment->equipment_id]) }}"
                                class="btn btn-outline-success">ดู</a>
                            <a href="{{ route('equipments.edit', ['equipment' => $equipment->equipment_id]) }}"
                                class="btn btn-outline-info">แก้ไข</a>
                            <button class="btn btn-outline-danger"
                                onclick="delEquipments({{ $equipment->equipment_id }})">ลบ</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
