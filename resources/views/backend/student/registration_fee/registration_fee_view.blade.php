@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- col-12 1st -->
          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
                <h4 class="box-title">Student <strong>Registration Fee</strong></h4>
              </div>

              <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5>Year</h5>
                        <div class="controls">
                          <select name="year_id" id="year_id" required class="form-control">
                            <option value="" selected disabled>Select Year</option>
                            @foreach ($years as $year)
                            <option value="{{$year->id}}">{{$year->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-md-4 -->

                    <div class="col-md-4">
                      <div class="form-group">
                        <h5>Class</h5>
                        <div class="controls">
                          <select name="class_id" id="class_id" required class="form-control">
                            <option value="" selected disabled>Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-md-4 -->

                    <div class="col-md-4" style="padding-top: 25px;">
                      <a id="search" name="search" value="Search" class="btn btn-rounded btn-primary mb-5">Search</a>
                    </div>
                    <!-- /.col-md-4 -->
                  </div>
                  <!-- /.row -->

                  <!-- Start Registration Fee Table -->

                  <div class="row">
                      <div class="col-md-12">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                <table class="table table-border table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @{{{#each this}}}
                                            <tr>
                                                @{{{tdsource}}}
                                            </tr>
                                        @{{{/each}}}
                                    </tbody>
                                </table>
                            </script>
                        </div>
                      </div>
                      <!-- /.col-md-12 -->
                  </div>
                  <!-- /.row d-none -->

                  <!-- End Registration Fee Table -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box bb-3 border-warning -->
          </div>
          <!-- /.col-12 1st -->


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
</div>

<!-- =========== Get Registration Fee Method =========== -->
<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
     $.ajax({
      url: "{{ route('student.registration.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id},
      beforeSend: function() {
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script>
<!-- ============ End Get Registration Fee Method ============= -->
@endsection
