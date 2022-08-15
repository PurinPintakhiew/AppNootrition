@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                แก้ไขประเภทอุปกรณ์
            </div>
            <div class="card-body">
                <form action="{{route('categories.update',['category' => $categories->categories_id])}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">ชื่อประเภท</label>
                        <input type="text" name="categories_name" class="form-control" value="{{$categories->categories_name}}">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-outline-primary" type="submit">บันทึก</button>
                        <a href="{{route('categories.index')}}" class="btn btn-outline-danger">ยกเลิก</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
