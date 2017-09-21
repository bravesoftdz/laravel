@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-list">
                    <div class="header">
                        <div class="row">
                            {{ Breadcrumbs::render('pages.slider') }}
                            <div class="col-md-10">
                                {{-- Upload file head --}}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                       <div>
                        <form class="dropzone" id="slider-dropzone" method="post" enctype="multipart/form-data">
                            <div class="fallback">
                                <input name="file" type="file" multiple />=
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
@endpush
