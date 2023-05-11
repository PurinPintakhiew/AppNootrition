@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <p class="fs-2">แผนก</p>
        <div class="text-start mb-2">
            <a href="{{ route('departments.create') }}" class="btn btn-outline-primary">เพิ่มแผนก</a>
            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">ย้อนกลับ</a>
        </div>
        <div class="text-end mb-2">
            <button class="btn btn-outline-info" onclick="printDe()">
                <i class="bi bi-printer"></i> <span>Print</span>
            </button>
        </div>

        <div class="text-center">
            <table class="table table-striped table-hover " id="prtDe">
                <thead class="table-dark">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อแผนก</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $key => $department)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $department->department_name }}</td>
                            <td>
                                <a class="btn btn-outline-warning"
                                    href="{{ route('departments.edit', ['department' => $department->department_id]) }}">แก้ไข</a>
                                <button class="btn btn-outline-danger"
                                    onclick="delDepartment({{ $department->department_id }})">ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <script>
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
    </script> --}}

    {{-- Delete Button --}}
    {{-- <script>
        const delDepartment = (id) => {
            Swal.fire({
                title: 'Are you sure delete?',
                text: 'ต้องการลบข้อมูลแผนกหรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('departments') }}/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (response) => {
                            if (response) {
                                Swal.fire(
                                    'สำเร็จ',
                                    'สำเร็จ',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                })

                            } else {
                                Swal.fire(
                                    'ไม่สำเร็จ!',
                                    'ไม่สำเร็จ.',
                                    'error'
                                )
                            }
                        },
                    });

                }
            })
        }
    </script> --}}

    {{-- Print Button --}}
    <script>
        let data = @json($departments);

        function printDe() {
            let table = document.createElement('table');
            let thead = document.createElement('thead');
            let tbody = document.createElement('tbody');
            table.style.width = '100%';
            table.style.border = '1px solid black';
            table.style.textAlign = 'center';
            table.style.borderCollapse = 'separate';
            table.style.borderSpacing = '0px';
            let columns = ['ลำดับ', 'ชื่อแผนก'];
            let trhead = document.createElement('tr');
            columns.forEach(element => {
                let th = document.createElement('th');
                th.style.border = '1px solid black';
                th.appendChild(document.createTextNode(element))
                trhead.appendChild(th)
            });
            tbody.appendChild(trhead);

            data.forEach((element, key) => {
                let tr = document.createElement('tr');
                if ('department_id' in element) {
                    let td = document.createElement('td');
                    td.style.border = '1px solid black';
                    td.appendChild(document.createTextNode(key + 1))
                    tr.appendChild(td)
                }
                if ('department_name' in element) {
                    let td = document.createElement('td');
                    td.style.border = '1px solid black';
                    td.appendChild(document.createTextNode(element.department_name))
                    tr.appendChild(td)
                }
                tbody.appendChild(tr);
            });

            table.appendChild(thead);
            table.appendChild(tbody);
            newWin = window.open("");
            newWin.document.write(table.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>
@endsection
