@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/categories.create') }}@endsection

@section('pageTitle'){{ trans('backend/categories.edit') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.categories.index') }}">{{ trans('backend/categories.control') }}</a></li>
    <li class="active">{{ trans('backend/categories.edit') }}</li>
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
                        <form action="{{ route('backend.categories.update', $category->id) }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">{{ trans('backend/categories.attributes.name') }}</label>
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="{{ trans('backend/categories.hints.name') }}" required>
                                    </div>
                                    
                                </div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary ">{{ trans('backend/categories.edit') }}</button>
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