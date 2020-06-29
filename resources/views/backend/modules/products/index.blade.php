@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/products.all') }}@endsection

@section('pageTitle'){{ trans('backend/products.all') }}@endsection

@section('breadcrumb')
    <li class="active">{{ trans('backend/products.all') }}</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">                                                                                       @if(auth()->user()->hasPermission('create_products'))
                        <a href="{{ route('backend.products.create') }}" class="btn btn-success btn-sm">{{ trans('backend/master.control.create') }}</a>
                    @else
                        <a href="#" class="btn btn-success disabled">{{ trans('backend/master.control.create') }}</a>
                    @endif
                        <div class="box-tools">
                            <form action="{{ route('backend.products.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input class="form-control pull-right" name="q" value="{{ old('q') }}" placeholder="Search" type="text">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>

                        </div>

                    </div>
                    <br>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        
                        @if($products->count() > 0)
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('backend/master.index-nav.name') }}</th>
                                <th>{{ trans('backend/master.index-nav.discreption') }}</th>
                                <th>{{ trans('backend/products.attributes.category_name') }}</th>
                                <th>{{ trans('backend/master.index-nav.image') }}</th>
                                <th>{{ trans('backend/master.index-nav.purchase_price') }}</th>
                                <th>{{ trans('backend/master.index-nav.sale_price') }}</th>
                                <th>{{ trans('backend/master.index-nav.profit_percent') }} %</th>
                                <th>{{ trans('backend/master.index-nav.stock') }}</th>                                
                                <th>{{ trans('backend/master.index-nav.action') }}</th>                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index=>$product)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->discreption }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td><img src="{{ $product->image_path }}" style="width: 100px" class="img-thumbnail"></td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->profit_percent }} %</td>
                                <td>{{ $product->stock }}</td>                  
                                <td>

                                @if(auth()->user()->hasPermission('update_products'))

                                    <a href="{{ route('backend.products.edit', $product->id) }}" class="btn btn-info btn-sm"><li class="fa fa-edit"></li> {{ trans('backend/master.control.edit') }}</a>
                                @else
                                    <a href="#" class="btn btn-info disabled"><li class="fa fa-edit"></li> {{ trans('backend/master.control.edit') }}</a>
                                @endif
                                @if(auth()->user()->hasPermission('delete_products'))
                                    <form action="{{ route('backend.products.destroy', $product->id) }}" method="post" style="display: inline-block">
                                    @csrf  
                                    @method('DELETE')  
                                    <button type="submit" class="btn btn-danger btn-sm"><li class="fa fa-trash"></li> {{ trans('backend/master.control.delete') }}</button>
                                    </form>
                                @else
                                    <button  class="btn btn-danger disabled"><li class="fa fa-trash"></li> {{ trans('backend/master.control.delete') }}</button>
                                @endif
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        @else
                            <h2>{{ trans('backend/master.index-nav.no_data_found') }}</h2>
                        @endif

                    </div>
                    <!-- pagination -->
        <div class="clearfix">
            {!! $products->links() !!}
        </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection