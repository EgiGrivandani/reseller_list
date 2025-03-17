<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3>Add reseller</h3>
		</div>
	</div>
</div>
<section class="section">
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<form class="form form-vertical" id="formInput" enctype="multipart/form-data">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group mandatory">
									<label for="flName" class="form-label">Name</label>
									<input type="text" id="flName" class="form-control" name="fname" placeholder="name ads">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="image" class="form-label">Image</label>
									<input type="file" id="image" class="form-control" name="image" placeholder="image">
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1" id="btnsbmt">Submit</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<script>
	$('#bannerNAV').addClass('active');
</script>


<script>

	$('#formInput').submit(function(e) {
		e.preventDefault();
		$('#btnsbmt').prop('disabled', true);
		var formData = new FormData(this);

		var base_url = "<?= base_url() ?>";
		$.ajax({
			url: base_url + 'Admin/bannerAjax_post',
			type: 'post',
			dataType: 'json',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.status == false) {
					Swal.fire(
						'Error!',
						response.message,
						'error'
					)
				} else {
					Swal.fire({
						title: 'Success!',
						text: response.message,
						icon: 'success',
						confirmButtonText: 'OK'
					}).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					});
				}

				$('#btnsbmt').prop('disabled', false);

			}
		});
	})

</script>
