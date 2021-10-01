@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
  <div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit School Subject</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form action="{{route('update.school.subject',$editData->id)}}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>School Subject Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="text-xs-right">
                            <input type="submit" value="Update" class="btn btn-rounded btn-info mb-5">
                        </div>
                    </form>

                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
</div>
@endsection