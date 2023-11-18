@extends('layouts.home')

@section('title', 'Page Home')
@section('style')
<style>
    .show-node-pdf {
        border: 1px solid #fedba7;
        background: #fff2df;
        border-radius: 10px;
        padding: 0.5rem;
    }
</style>
@endsection
@section('content')
<section class="content-wrap bg-light section pb-5" id="features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @if(isset($data->file_pdf_name) && !empty($data->file_pdf_name))
                <div class="text-center mb-3 d-none d-sm-block">
                    <object data="{{ asset('images/blogs/pdf').'/'.$data->file_pdf_name }}" type="application/pdf" width="100%" height="800"> </object>
                </div>
                <div class="text-center mb-3 d-block d-sm-none show-node-pdf">
                    <div><b>เบราว์เซอร์นี้ไม่สนับสนุน PDF กรุณาดาวน์โหลดไฟล์ PDF เพื่อดู</b> </div>
                    <a class="btn mt-1" href="{{ asset('images/blogs/pdf').'/'.$data->file_pdf_name }}">Download PDF</a>
                </div>
                @endif
            </div>

            <div class="col-md-12 text-center">
                @if(isset($data->link_youtube) && !empty($data->link_youtube))
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $data->link_youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                @endif
            </div>

            <div class="col-md-12 text-center">
                @if(isset($data->summarynote) && !empty($data->summarynote))
                <div class="sharethis-sticky-share-buttons"></div>
                <?php echo $data->summarynote; ?>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=65584d39c10bb40019129ece&product=sticky-share-buttons&source=platform" async="async"></script>  
@endpush