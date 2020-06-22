@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/articles.create') }}@endsection

@section('pageTitle'){{ trans('backend/articles.create') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.dashboard') }}">{{ trans('backend/articles.control') }}</a></li>
    <li class="active">{{ trans('backend/articles.create') }}</li>
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
                        <form action="{{ route('backend.articles.store') }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">{{ trans('backend/articles.attributes.title') }}</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="{{ trans('backend/articles.hints.title') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">{{ trans('backend/articles.attributes.author') }}</label>
                                        <input type="text" name="author" value="{{ old('author') }}" class="form-control" id="author" placeholder="{{ trans('backend/articles.hints.author') }}">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="col-md-10 col-xs-10">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="description">{{ trans('backend/articles.attributes.description') }}</label>
                                        <textarea name="description" class="form-control description" id="description" rows="3" placeholder="{{ trans('backend/articles.hints.description') }}">{{ old('description') }}</textarea>
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