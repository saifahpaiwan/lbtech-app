@extends('layouts.app')

@section('title', 'Page Users Index')

@section('content')

<div class="card">
    <div class="card-header">
        Page Blog index
    </div>
    <div class="card-body">
        <a class="btn btn-dark waves-effect waves-light mb-2" href="{{ route('blogs.create') }}">เพิ่มข้อมูล</a>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">รูป</th>
                        <th>หัวข้อ</th>
                        <th width="15%">จำนวนคนดู</th>
                        <th width="20%">#</th>
                    </tr>
                </thead>
                <tbody>

                    @if(isset($data) && count($data)>0)
                    @foreach($data as $key=>$row)
                    <tr>
                        <th> {{ ($key+1) }}</th>
                        <td>  
                            @if(isset($row->image_name) && !empty($row->image_name))
                            <img class="d-flex mr-2 rounded" src="{{ asset('images/blogs').'/'.$row->image_name }}" height="50">
                            @else
                            <div class="img-list-no mr-2"></div>
                            @endif
                        </td>
                        <td> {{ $row->title }} </td>
                        <td> {{ number_format($row->count_view) }} </td>
                        <td class="text-right">
                            <a class="btn btn-dark waves-effect waves-light" href="{{ route('blogs.edit', $row->id) }}">แก้ไข</a>

                            <form method="POST" action="{{ route('delete.blogs') }}" style="display:inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ ($row->id)? $row->id : 0 }}">
                                <button type="submit" class="btn btn-danger waves-effect waves-light delete-confirm">ลบข้อมูล</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush