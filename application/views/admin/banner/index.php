<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3>Banner</h3>
		</div>
	</div>
</div>
<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('Admin/banner_post')?>" class="btn icon icon-left btn-primary">New</a>
		</div>
		<div class="card-body">
			<div class="table-responsive datatable-minimal">
				<table class="table" id="table1">
					<thead>
					<tr>
						<th>name</th>
						<th>image</th>
						<th>status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($list as $row):?>
						<?php
						$status  = 'active';
						$badgeBG = 'success';
						if($row->status == 0){
							$status = 'Non-active';
							$badgeBG = 'danger';
						}
						$statBadge = '<span class="badge bg-'.$badgeBG.'">'.$status.'</span>';
						?>
						<tr>
							<td><?=$row->name?></td>
							<td>
								<a href="<?= base_url('assets/banner/'.$row->image)?>" target="_blank">
									<img src="<?= base_url('assets/banner/'.$row->image)?>" alt="<?=$row->name?>" style="width: 250px;">
								</a>
							</td>
							<td><?=$statBadge?></td>
							<td>
								<div class="btn-group">
									<a href="<?= base_url('Admin/banner_put/'.$row->id)?>" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
									<a href="javascript:void(0)" class="btn icon btn-warning" onclick="handleClick(event, <?=$row->id?>)"><i class="bi bi-exclamation-triangle"></i></a>
									<a href="javascript:void(0)" class="btn icon btn-danger" onclick="deleteClick(event, <?=$row->id?>)"><i class="bi bi-trash-fill"></i></a>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$('#bannerNAV').addClass('active');
	function handleClick(event, link) {
		event.preventDefault();

		Swal.fire({
			title: "Are you sure?",
			text: "Status akan di ganti",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes!"
		}).then((result) => {
			if (result.isConfirmed) {
				var base_url = "<?= base_url() ?>";
				$.ajax({
					url: base_url + 'Admin/bannerStatus_put',
					type: 'post',
					dataType: 'json',
					data: {
						id: link
					},
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
			}
		});

	}


	function deleteClick(event, link) {
		event.preventDefault();

		Swal.fire({
			title: "Are you sure?",
			text: "Banner akan di hapus",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes!"
		}).then((result) => {
			if (result.isConfirmed) {
				var base_url = "<?= base_url() ?>";
				$.ajax({
					url: base_url + 'Admin/banner_del',
					type: 'post',
					dataType: 'json',
					data: {
						id: link
					},
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
			}
		});

	}

</script>
