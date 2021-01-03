@extends('layouts.master')
@section('content')
<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3>Add Bank
								<a class="btn btn-success float-right btn-sm" href="{{route('bank.view')}}"><i class="fa fa-list"></i>Bank List</a>
							</h3>
						</div>
						<form class="AddBank" id="AddBank" name="AddBank" method="POST" action="javascript:void(0)">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="form-group col-md-6">
										<label for="bank_name">Bank Name</label>
										<input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name">
										<font style="color: red">
											{{($errors->has('name'))?($errors->first('name')):''}}
										</font>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
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


				var bank_name = $('input[name="bank_name"]').val()

				var form = $('AddBank')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				formData.append('bank_name', bank_name);

				$.ajax({
					url: "{{route('bank.store')}}",
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

							window.location.replace('/bank/');
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

		$('#AddBank').validate({
			rules: {
				bank_name: {
					required: true,
				},
			},
			messages: {
				bank_name: {
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