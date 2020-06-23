@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/users.create') }}@endsection

@section('pageTitle'){{ trans('backend/users.create') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.users.index') }}">{{ trans('backend/users.control') }}</a></li>
    <li class="active">{{ trans('backend/users.create') }}</li>
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
                        <form action="{{ route('backend.users.store') }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="first_name">{{ trans('backend/users.attributes.first_name') }}</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="first_name" placeholder="{{ trans('backend/users.hints.first_name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ trans('backend/users.attributes.last_name') }}</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="last_name" placeholder="{{ trans('backend/users.hints.last_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ trans('backend/users.attributes.email') }}</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="{{ trans('backend/users.hints.email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ trans('backend/users.attributes.password') }}</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="{{ trans('backend/users.hints.password') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                        {{ trans('backend/users.attributes.password_confirmation') }}</label>
                                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="password_confirmation" placeholder="{{ trans('backend/users.hints.password_confirmation') }}">
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