@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                เบิกอุปกรณ์
            </div>
        </div>
        <form action="{{ route('withdraws.store') }}" method="post">
            @csrf

        </form>
    </div>
@endsection
