@extends('layouts.app')

@section('title', 'Page Users Edit')

@section('content') 
    <h1> แก้ไขรายชื่อผู้ใช้งาน </h1> 
    ID : {{ $id }} <br>  
    <a href="{{ route('users.index') }}"> ย้อนกลับ </a>
@endsection

@push('scripts') 
@endpush