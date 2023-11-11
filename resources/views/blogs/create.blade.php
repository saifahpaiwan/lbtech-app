@extends('layouts.app')

@section('title', 'Page Blog Create')

@section('content')

<div class="card">
    <div class="card-header">
        Page Blog Create
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('save.blogs') }}">
            @csrf
            @include('blogs.form')
        </form>
        
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).on('change', '#images_name', function(event) {
        html = '<div class="box-image-no" style="background: #ddd;border-radius: 50%; width: 100px; height: 100px;"> </div>';
        $('.img-file-upload-1').html(html);
        var Images = $('#images_name');
        if (Images[0].files[0]) {
            url = window.URL.createObjectURL(Images[0].files[0]);
            html = '<div class="box-image-no" style="background: url(' + url + '); background-size: cover; background-position: center;border-radius: 50%; width: 100px; height: 100px;"> </div>';
        }
        $('.img-file-upload-1').html(html);
    });
</script>
@endpush