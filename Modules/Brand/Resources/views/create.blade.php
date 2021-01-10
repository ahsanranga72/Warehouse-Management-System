@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
              <h3>Add Brand
                 <a class="btn btn-success float-right btn-sm" href="{{route('brand.view')}}"><i class="fa fa-list"></i>Brand List</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form id="" class="" name="" method="POST" action="{{Route('brand.store')}}">
                  @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="name">Brand Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                    <font style="color: red">
              		  {{($errors->has('name'))?($errors->first('name')):''}}
              		</font>
                  </div>
                </div>
                    </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@push('scripts')
<script>
	$(document).ready(function() {

		$.validator.setDefaults({
			submitHandler: function() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name="_token"]').val()
					}
				});


				var name = $('input[name="name"]').val()

				var form = $('addBrand')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				formData.append('name', name);

				$.ajax({
					url: "{{route('brand.store')}}",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					success: function(resp) {
						console.log(resp)
						if (resp.success) {

							Toast.fire({
								icon: 'success',
								title: resp.message
							})

							window.location.replace('/brand/');
						} else {
							Toast.fire({
								icon: 'danger',
								title: resp.message
							})
						}

					}
				})

			}
		})

		$('#addBrand').validate({
			rules: {
				name: {
					required: true,
				},
			},
			messages: {
				name: {
					required: "Please Enter bank name",
				},
			},
			errorElement: 'span',
			onfocusout: false,
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			invalidHandler: function(form, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					validator.errorList[0].element.focus();
				}
			}
		})
	});
</script>
@endpush