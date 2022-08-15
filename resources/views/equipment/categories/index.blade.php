@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-end mb-2">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">เพิ่มประเภท</a>
        </div>
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อประเภท</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td >{{ $key + 1 }}</td>
                            <td>{{ $category->categories_name  }}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('categories.edit', ['category' => $category->categories_id]) }}">แก้ไข</a>
                                <button class="btn btn-outline-danger" onclick="delCategories({{$category->categories_id}})">ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function delCategories(id) {

            $.ajax({
                type: "DELETE",
                url: "{{ url('categories') }}/" + id,
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
