@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark">
                <h4 class="text-white">แก้ไขข้อมูลอุปกรณ์</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('equipments.update', ['equipment' => $equipment->equipment_id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">ชื่ออุปกรณ์</label>
                        <input type="text" name="equipment_name"
                            class="form-control @error('equipment_name') is-invalid @enderror"
                            value="{{ $equipment->equipment_name }}">
                        @error('equipment_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">ประเภทอุปกรณ์</label>
                        <select name="categories_id" class="form-select @error('categories_id') is-invalid @enderror">
                            @if ($equipment->categories_id != '')
                                <option value="">-</option>
                                @foreach ($categories as $category)
                                    <option @if ($equipment->categories_id == $category->categories_id) selected @endif
                                        value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
                                @endforeach
                            @else
                                <option value="">-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
                                @endforeach
                            @endif


                        </select>
                        @error('categories_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">วันซื้อเข้า</label>
                                <input type="date" name="buy_date"
                                    class="form-control @error('buy_date') is-invalid @enderror"
                                    value="{{ $equipment->buy_date }}">
                                @error('buy_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">จำนวน</label>
                                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"
                                    value="{{ $equipment->qty }}">
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">สถานะ</label>
                                <select name="stetus" class="form-control  @error('stetus') is-invalid @enderror">
                                    <option @if ($equipment->stetus == 0) selected @endif value="0">ว่าง</option>
                                    <option @if ($equipment->stetus == 1) selected @endif value="1">ไม่ว่าง
                                    </option>
                                </select>
                                @error('stetus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">ที่อยู่อุปกรณ์</label>
                        <textarea name="equipment_address" class="form-control @error('equipment_address') is-invalid @enderror">{{ $equipment->equipment_address }}</textarea>
                        @error('equipment_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-outline-primary" type="submit">บันทึก</button>
                        <a href="/" class="btn btn-outline-danger">ยกเลิก</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
