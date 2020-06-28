@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/products.create') }}@endsection

@section('pageTitle'){{ trans('backend/products.create') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.products.index') }}">{{ trans('backend/products.control') }}</a></li>
    <li class="active">{{ trans('backend/products.create') }}</li>
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
                        <form action="{{ route('backend.products.store') }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label >{{ trans('backend/products.attributes.category_name') }}</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option value="">{{ trans('backend/products.all') }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''  }}>{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ trans('backend/products.attributes.name') }}</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="{{ trans('backend/products.hints.name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="discreption">{{ trans('backend/products.attributes.discreption') }}</label>
                                        <textarea type="text" name="discreption" class="form-control" id="discreption" placeholder="{{ trans('backend/products.hints.discreption') }}">{{ old('discreption') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ trans('backend/products.attributes.image') }}</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_price">{{ trans('backend/products.attributes.purchase_price') }}</label>
                                        <input type="number" name="purchase_price" class="form-control" value="{{ old('purchase_price') }}" id="purchase_price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sale_price">{{ trans('backend/products.attributes.sale_price') }}</label>
                                        <input type="number" name="sale_price" class="form-control" id="sale_price" value="{{ old('sale_price') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">{{ trans('backend/products.attributes.stock') }}</label>
                                        <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required>
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