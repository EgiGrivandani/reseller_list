
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('assets/profile/').$list->image?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
	<link rel="stylesheet" href="<?=base_url('assets/home/css/style.css')?>">
</head>

<body class="d-flex flex-column min-vh-100" style="background-image: url(<?=base_url('assets/home/image/bg-logo.png')?>);">
	<section class="profil-card">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12  col-md-10 col-lg-8 col-xl-7">
					<div class="card-custom">
						<div class="top-layers">
							<div class="top-content">
								<img src="<?=base_url('assets/profile/').$list->image?>" alt="">
								<div>
									<p class="title"><?=$list->company?>
										<i class="ti ti-rosette-discount-check-filled"></i>
									</p>
									<p class="fullname">
										<i class="ti ti-user-circle"></i>
										<?=$list->name?>
									</p>
								</div>
							</div>
							<div class="layer layer-bg-1"></div>
							<div class="layer layer-bg-2"></div>
						</div>
						<div class="detail">
							<table class="w-100">
								<tr>
									<td class="list-title">
										<i class="ti ti-phone"></i>
										Phone Number
									</td>
									<td>:</td>
									<td class="list-content"><?=$list->phone_number?></td>
								</tr>
								<tr>
									<td class="list-title">
										<i class="ti ti-world-www"></i>
										Website
									</td>
									<td>:</td>
									<td class="list-content">
										<?php
										$url = $list->website;
										$url = str_replace(["https://", "http://"], "", $url);
										?>
										<a href="<?=$list->website?>" target="_blank"><?=$url?></a>
									</td>
								</tr>
								<tr>
									<td class="list-title">
										<i class="ti ti-map-pin"></i>
										Address
									</td>
									<td>:</td>
									<td class="list-content">
										<p><?= nl2br($list->address)?></p>
									</td>
								</tr>
							</table>

						</div>
						<div class="payment">
							<p class="title">Payment Method</p>
							<p><?=nl2br($list->payment_option)?></p>
							<div class="icon-payment">
								<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
									 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
									 stroke-linejoin="round"
									 class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" />
									<path d="M3 10h18" />
									<path d="M16 19h6" />
									<path d="M19 16l3 3l-3 3" />
									<path d="M7.005 15h.005" />
									<path d="M11 15h2" />
								</svg>
							</div>
						</div>
						<div class="button-detail">
							<div class="row g-md-2 g-1">
								<?php if(!empty($list->whatsapp)):?>
									<div class="col-md">
										<a class="btn btn-wa" title="Whatsapp"  href="<?=$list->whatsapp?>">
											<i class="ti ti-brand-whatsapp "></i> WhatsApp Order
										</a>
									</div>
								<?php endif;?>

								<?php if(!empty($list->telegram)):?>
									<div class="col-md">
										<a class="btn btn-tele " title="Telegram" href="<?=$list->telegram?>">
											<i class="ti ti-brand-telegram"></i> Telegram Order
										</a>
									</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<footer class="mt-auto">
		<section class="footer">
			<div class="container">
				<p class="content"> Copyright &copy; 2024
					PT. Borneo World Wide.
					All rights reserved.</p>
		</section>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
	</script>


</body>

</html>
