@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/users.all') }}@endsection

@section('pageTitle'){{ trans('backend/users.all') }}@endsection

@section('breadcrumb')
    <li class="active">{{ trans('backend/users.all') }}</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">                                                                                       @if(auth()->user()->hasPermission('create_users'))
                        <a href="{{ route('backend.users.create') }}" class="btn btn-success btn-sm">{{ trans('backend/master.control.create') }}</a>
                    @else
                        <a href="#" class="btn btn-success disabled">{{ trans('backend/master.control.create') }}</a>
                    @endif
                        <div class="box-tools">
                            <form action="{{ route('backend.users.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input class="form-control pull-right" name="q" value="{{ old('q') }}" placeholder="Search" type="text">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        
                        @if($users->count() > 0)
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('backend/master.index-nav.first_name') }}</th>
                                <th>{{ trans('backend/master.index-nav.last_name') }}</th>
                                <th>{{ trans('backend/master.index-nav.email') }}</th>
                                <th>{{ trans('backend/master.index-nav.action') }}</th>                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $index=>$user)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                @if(auth()->user()->hasPermission('update_users'))

                                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-info btn-sm"><li class="fa fa-edit"></li> {{ trans('backend/master.control.edit') }}</a>
                                @else
                                    <a href="#" class="btn btn-info disabled"><li class="fa fa-edit"></li> {{ trans('backend/master.control.edit') }}</a>
                                @endif
                                @if(auth()->user()->hasPermission('delete_users'))
                                    <form action="{{ route('backend.users.destroy', $user->id) }}" method="post" style="display: inline-block">
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
            {!! $users->appends($text)->links() !!}
        </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection