@extends('layouts.app')

@section('title', 'Page Users Create')

@section('content') 
    <h1> เพิ่มรายชื่อผู้ใช้งาน </h1> 
    <a href="{{ route('users.index') }}"> ย้อนกลับ </a>
@endsection

@push('scripts') 
@endpush