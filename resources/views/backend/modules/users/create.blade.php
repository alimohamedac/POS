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
                                        <label for="image">{{ trans('backend/users.attributes.image') }}</label>
                                        <input type="file" name="image" class="form-control" id="image">
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
                                    <div class="form-group">
                                        <div class="card">
                                              <div class="card-header d-flex p-0">
                                                <h3 class="card-title p-3">Permissions</h3>
                                                <ul class="nav nav-pills ml-auto p-2">
                                                  <li class="nav-item"><a class="nav-link active" href="#users" data-toggle="tab">Users</a></li>
                                                  <li class="nav-item"><a class="nav-link " href="#categories" data-toggle="tab">Categories</a></li>
                                                  <li class="nav-item"><a class="nav-link " href="#products" data-toggle="tab">Products</a></li>
                                                  <li class="nav-item"><a class="nav-link " href="#clients" data-toggle="tab">Clients</a></li>
                                                  <li class="nav-item"><a class="nav-link " href="#orders" data-toggle="tab">Orders</a></li>
                                                </ul>
                                              </div><!-- /.card-header -->

                                              <div class="card-body">
                                                <div class="tab-content">
                                                  <div class="tab-pane active" id="users">
                                                    <label><input type="checkbox" name="permissions[]" value="create_users">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" value="read_users">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" value="update_users">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" value="delete_users">Delete</label>                                                    
                                                  </div>

                                                  
                                                  <div class="tab-pane " id="categories">
                                                    <label><input type="checkbox" name="permissions[]" value="create_categories">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" value="read_categories">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" value="update_categories">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" value="delete_categories">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="products">
                                                    <label><input type="checkbox" name="permissions[]" value="create_products">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" value="read_products">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" value="update_products">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" value="delete_products">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="clients">
                                                    <label><input type="checkbox" name="permissions[]" value="create_clients">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" value="read_clients">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" value="update_clients">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" value="delete_clients">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="orders">
                                                    <label><input type="checkbox" name="permissions[]" value="create_orders">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" value="read_orders">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" value="update_orders">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" value="delete_orders">Delete</label>                                                    
                                                  </div>
                                                  
                                                </div>
                                              </div><!-- /.card-body -->
                                            </div>
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