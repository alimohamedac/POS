@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/clients.create') }}@endsection

@section('pageTitle'){{ trans('backend/clients.create') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.clients.index') }}">{{ trans('backend/clients.control') }}</a></li>
    <li class="active">{{ trans('backend/clients.create') }}</li>
@endsection

@section('styles')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('backend/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="row">
                        @include('backend.partials._errors')
                        <form action="{{ route('backend.clients.store') }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">{{ trans('backend/clients.attributes.name') }}</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="{{ trans('backend/clients.hints.name') }}" required>
                                    </div>
                                    @for($i=0;$i<2;$i++)
                                    <div class="form-group">
                                        <label for="phone">{{ trans('backend/clients.attributes.phone') }}</label>
                                        <input type="text" name="phone[]" class="form-control" id="phone" placeholder="{{ trans('backend/clients.hints.phone') }}" >
                                    </div>
                                    @endfor
                                    <div class="form-group">
                                        <label for="address">{{ trans('backend/clients.attributes.address') }}</label>
                                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address" placeholder="{{ trans('backend/clients.hints.address') }}" required>
                                    </div>
                                    
                                    
                                </div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend/master.control.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('backend/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        //bootstrap WYSIHTML5 - text editor
        $('.description').wysihtml5()
    </script>
@endsection