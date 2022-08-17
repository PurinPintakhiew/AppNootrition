@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                เพิ่มข้อมูลผู้ใช้
            </div>
            <div class="card-body">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อ</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">แผนก</label>
                        <select type="text" name="department_id" class="form-select">
                            <option value="">-</option>
                            @foreach ($departments as $department )
                                <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">เบอร์</label>
                        <input type="number" name="telephone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">อีเมล</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-outline-primary" type="submit">บันทึก</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-danger">ยกเลิก</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
