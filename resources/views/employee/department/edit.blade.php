@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                แก้ไขแผนก
            </div>
            <div class="card-body">
                <form action="{{route('departments.update',['department' => $department->department_id])}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">ชื่อแผนก</label>
                        <input type="text" name="department_name" class="form-control" value="{{$department->department_name}}">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-outline-primary" type="submit">บันทึก</button>
                        <a href="{{route('departments.index')}}" class="btn btn-outline-danger">ยกเลิก</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
