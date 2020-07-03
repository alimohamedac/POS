@extends('backend.layouts.master')

@section('Title'){{ trans('backend/master.control-panel') }} - {{ trans('backend/users.create') }}@endsection

@section('pageTitle'){{ trans('backend/users.edit') }}@endsection

@section('breadcrumb')
    <li><a href="{{ route('backend.users.index') }}">{{ trans('backend/users.control') }}</a></li>
    <li class="active">{{ trans('backend/users.edit') }}</li>
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
                        <form action="{{ route('backend.users.update', $user->id) }}" enctype="multipart/form-data" method="post" role="form">
                            @csrf
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="first_name">{{ trans('backend/users.attributes.first_name') }}</label>
                                        <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="first_name" placeholder="{{ trans('backend/users.hints.first_name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ trans('backend/users.attributes.last_name') }}</label>
                                        <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" id="last_name" placeholder="{{ trans('backend/users.hints.last_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ trans('backend/users.attributes.email') }}</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="{{ trans('backend/users.hints.email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ trans('backend/users.attributes.image') }}</label>
                                        <input type="file" name="image" class="form-control" id="image">
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
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('create_users') ? 'checked' : '' }} value="create_users">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('read_users') ? 'checked' : '' }} value="read_users">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('update_users') ? 'checked' : '' }} value="update_users">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('delete_users') ? 'checked' : '' }} value="delete_users">Delete</label>                                                    
                                                  </div>

                                                  
                                                  <div class="tab-pane " id="categories">
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('create_categories') ? 'checked' : '' }} value="create_categories">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('read_categories') ? 'checked' : '' }} value="read_categories">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('update_categories') ? 'checked' : '' }} value="update_categories">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('delete_categories') ? 'checked' : '' }} value="delete_categories">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="products">
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('create_products') ? 'checked' : '' }} value="create_products">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('read_products') ? 'checked' : '' }} value="read_products">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('update_products') ? 'checked' : '' }} value="update_products">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('delete_products') ? 'checked' : '' }} value="delete_products">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="clients">
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('create_clients') ? 'checked' : '' }} value="create_clients">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('read_clients') ? 'checked' : '' }} value="read_clients">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('update_clients') ? 'checked' : '' }} value="update_clients">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('delete_clients') ? 'checked' : '' }} value="delete_clients">Delete</label>                                                    
                                                  </div>

                                                  <div class="tab-pane " id="orders">
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('create_orders') ? 'checked' : '' }} value="create_orders">Create</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('read_orders') ? 'checked' : '' }} value="read_orders">Read</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('update_orders') ? 'checked' : '' }} value="update_orders">Update</label>
                                                    <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission('delete_orders') ? 'checked' : '' }} value="delete_orders">Delete</label>                                                    
                                                  </div>

                                                  
                                                </div>
                                              </div><!-- /.card-body -->
                                            </div>
                                        </div>

                                    </div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary ">{{ trans('backend/users.edit') }}</button>
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