@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark">
                <h4 class="text-white">ยืมอุปกรณ์</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('borrowings.update',['borrowing'=>$bw->borrow_id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">ชื่ออุปกรณ์</label>
                        <input type="text" name="equipment_name"
                            class="form-control @error('equipment_name') is-invalid @enderror"
                            value="{{ $bw->equipment_name }}" readonly>
                        @error('equipment_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="equipment_id"
                            class="form-control @error('equipment_id') is-invalid @enderror" value="{{ $bw->equipment_id }}"
                            readonly>
                        @error('equipment_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">วันที่ยืม</label>
                                <input type="date" name="borrow_date"
                                    class="form-control @error('borrow_date') is-invalid @enderror"
                                    value="{{ $bw->borrow_date }}">
                                @error('borrow_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">วันที่คืน</label>
                                <input type="date" name="remand_date"
                                    class="form-control @error('remand_date') is-invalid @enderror"
                                    value="{{ $bw->remand_date }}">
                                @error('remand_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">สถานะ</label>
                                <select name="stetus" class="form-control  @error('stetus') is-invalid @enderror">
                                    <option @if ($bw->stetus == 0) selected @endif value="0">ว่าง</option>
                                    <option @if ($bw->stetus == 1) selected @endif value="1">ไม่ว่าง
                                    </option>
                                </select>
                                @error('stetus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">การยืนยัน</label>
                                <select name="approve" class="form-control  @error('approve') is-invalid @enderror">
                                    <option  @if ($bw->approve == 0) selected @endif  value="0">ยังไม่ยืนยัน</option>
                                    <option  @if ($bw->approve == 1) selected @endif  value="1">ยืนยัน</option>
                                </select>
                                @error('approve')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-outline-primary" type="submit">บันทึก</button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-outline-danger">ยกเลิก</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
