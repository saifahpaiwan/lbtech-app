@extends('layouts.app')

@section('title', 'Page Users Index')

@section('content')
 
<h1> รายชื่อผู้ใช้งาน </h1>

<a href="{{ route('users.create') }}"> เพิ่มรายชื่อผู้ใช้งาน </a>
<br>
<a href="{{ route('users.edit', ['999']) }}"> แก้ไขรายชื่อผู้ใช้งาน </a>
@endsection

@push('scripts')
@endpush