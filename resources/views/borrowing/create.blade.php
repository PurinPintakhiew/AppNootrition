@extends('layouts.app')

@section('content')
            <!-- $table->id('borrow_id');
            $table->bigInteger('equipment_id')->unsigned()->nullable();
            $table->string('equipment_name')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->date('borrow_date');
            $table->date('remand_date');
            $table->tinyInteger('approve');
            $table->tinyInteger('stetus');
            $table->timestamps();
            $table->foreign('equipment_id')->references('equipment_id')->on('equipment')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete(); -->

    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark">
                <h4 class="text-white">ยืมอุปกรณ์</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('equipments.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่ออุปกรณ์</label>
                        <input type="text" name="equipment_name"
                            class="form-control @error('equipment_name') is-invalid @enderror">
                        @error('equipment_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label for="">ประเภทอุปกรณ์</label>
                        <select name="categories_id" class="form-select @error('categories_id') is-invalid @enderror">
                            <option value="">-</option>
                            @foreach ($equipments as $equipment )
                                <option value="{{$equipment->equipments_id}}">{{$equipment->equipments_name}}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">วันที่ยืม</label>
                                <input type="date" name="borrow_date"
                                    class="form-control @error('borrow_date') is-invalid @enderror">
                                @error('borrow_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">วันที่คืน</label>
                                <input type="date" name="remand_date"
                                    class="form-control @error('remand_date') is-invalid @enderror">
                                @error('remand_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- ยังไม่ได้ใส่ใน DB -->
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="">จำนวน</label>
                                <input type="number" name="qty"
                                    class="form-control @error('qty') is-invalid @enderror">
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">สถานะ</label>
                                <select name="stetus" class="form-control  @error('stetus') is-invalid @enderror">
                                    <option value="0">ว่าง</option>
                                    <option value="1">ไม่ว่าง</option>
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
                                    <option value="0">ยังไม่ยืนยัน</option>
                                    <option value="1">ยืนยัน</option>
                                </select>
                                @error('approve')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
