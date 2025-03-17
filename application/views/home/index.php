<?php
$assets = base_url('assets/home/');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$assets?>css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <section class="header">
        <div class="container">
            <div class="content-header">
                <div class="text">
                    <p class="title">Borneo Schematics Seller</p>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <p class="desc">Find a seller near you. Contact them for support or to purchase our
                                products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div class="banner">
		<div class="container">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
				 data-bs-interval="3000">
				<div class="carousel-inner">
					<?php $no = 1;?>
					<?php foreach ($banner as $row):?>
						<?php
						$classAct = '';
						if($no == 1){
							$classAct = ' active';
						}
						?>
						<div class="carousel-item <?= $classAct?>">
							<img src="<?=base_url('assets/banner/'.$row->image)?>" class="d-block" alt="...">
						</div>
					<?php endforeach;?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
    <section class="list-seller">
        <div class="container">
            <div class="header-list">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 ">
                        <div class="country ">
                            <i class="ti ti-world"></i>
                            <span>WORLWIDE</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-list">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">
                    <?php foreach ($worldwide as $row):?>
                    <div class="col">
                        <div class="card worldwide">
                            <div class="cards">
                                <div class="header-card">
                                    <div>
                                         <img src="<?= base_url('assets/profile/'.$row->image)?>" alt="">
                                    </div>
                                    <?= $row->company?>
                                </div>
                                <div class="content-card">
                                    <div class="list-card">
                                        <p class="title-list">Full Name :</p>
                                        <p class="dynamic-list"><?= $row->name?></p>
                                    </div>
                                    <div class="list-card">
                                        <p class="title-list">Phone Number : </p>
                                        <p class="dynamic-list"><?= $row->phone_number?></p>
                                    </div>
                                    <div class="list-card">
                                        <p class="title-list">Website : </p>
										<?php
										$url = $row->website;
										$url = str_replace(["https://", "http://"], "", $url);
										?>
                                        <p class="dynamic-list"><a href="<?= $row->website?>" target="_blank" style="color: blue;"><?= $url?></a></p>
                                    </div>
                                    <div class="list-card">
                                        <p class="title-list">Payment Method : </p>
                                        <p class="dynamic-list"><?= $row->payment_option?></p>
                                    </div>
                                    <div class="list-card">
                                        <p class="title-list">Address :</p>
                                        <p class="dynamic-list"><?= $row->address?></p>
                                    </div>
                                </div>
                                <div class="gradient-blur"></div>
                                <span class="see-more"> <i class="ti ti-chevrons-down me-1"></i>See More</span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
									<?php if(!empty($row->whatsapp)):?>
										<div class="col">
											<a class="btn  btn-wa" href="<?=$row->whatsapp?>" title="Whatsapp"
												target="_blank">
												<i class="ti ti-brand-whatsapp "></i> WA Order
											</a>
										</div>
									<?php endif;?>

									<?php if(!empty($row->telegram)):?>
										<div class="col">
											<a class="btn btn-tele  " href="<?=$row->telegram?>" title="Telegram"
												target="_blank">
												<i class="ti ti-brand-whatsapp "></i> Tele Order
											</a>
										</div>
									<?php endif;?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
    <section class="list-seller" id="sellerContent" style="display: none">
        <div class="container">
            <div class="text-center mb-3 ">
                <p class=""
                    style=" border-radius: 0.3rem; padding: 5px 10px; display: inline-block; font-size: clamp(12px, 8vw, 22px); font-weight: 600; background-color: #e7eef7; color: #182639;
                    text-transform: uppercase; text-shadow: 0 2px 2px #00000040; box-shadow: 0 2px 4px 0 rgba(52, 103, 156, 0.15);">
                    The seller list below provides
                    payment via
                    local bank transfer</p>
            </div>
            <div class="header-list">
                <div class="row  d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="country">
                            <iconify-icon icon="ic:round-flag"></iconify-icon>
                            <span id="countrySUB">UNDEFINED</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="notfound text-center" style="display: none;" id="searchNOTFOUND">
                    <img src="<?=$assets?>image/notfound.png" alt="">
                    <div>
                        <p class="text-notfound">Sorry, No results found for <span id="keySearch">"XXXXX"</span> </p>
                        <a href="<?= base_url()?>" class="btn btn-home">Refresh Page</a>
                    </div>
                </div>
            </div>
            <div class="card-list">
                <div class="row">

                    <?php for ($i=0; $i<3; $i++):?>
                    <div class="col-md-4 loadingCARD">
                        <div class="card cardss">
                            <div class="card__skeleton card__title"></div>
                            <div class="card__skeleton card__description"> </div>
                            <div class="card__skeleton card__title"></div>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3" id="contentList">

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


    <script>
    let card_template_start = `
<div class="col">
    <div class="card worldwide">
        <div class="cards">
            <div class="header-card">
                <div>
                    <img src="`;

    let card_template_company = `"></div>`;

    let card_template_mid = `</div>
            <div class="content-card">
                <div class="list-card">
                    <p class="title-list">Full Name :</p>
                    <p class="dynamic-list">`;

    let card_template_phone = `</p></div>
                <div class="list-card">
                    <p class="title-list">Phone Number :</p>
                    <p class="dynamic-list">`;

    let card_template_website = `</p></div>
                <div class="list-card">
                    <p class="title-list">Website :</p>
                    <p class="dynamic-list">`;

    let card_template_payment = `</p></div>
                <div class="list-card">
                    <p class="title-list">Payment Method :</p>
                    <p class="dynamic-list">`;

    let card_template_address = `</p></div>
                <div class="list-card">
                    <p class="title-list">Address :</p>
                    <p class="dynamic-list">`;

    let card_template_end = `</p></div>
            </div>
            <div class="gradient-blur"></div>
            <span class="see-more"> <i class="ti ti-chevrons-down me-1"></i>See More</span>
        </div>
        <div class="card-footer">
            <div class="row">`;

    let footer_wa = `
                <div class="col">
                    <a class="btn btn-wa" href="`;

    let footer_wa_icon = `" title="Whatsapp" target="_blank">
                        <i class="ti ti-brand-whatsapp"></i> WA Order
                    </a>
                </div>`;

    let footer_tele = `
                <div class="col">
                    <a class="btn btn-tele" href="`;

    let footer_tele_icon = `" title="Telegram" target="_blank">
                        <i class="ti ti-brand-telegram"></i> Tele Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>`;



    let bronze = 999;

    function loadingCard(type) {
        if (type == 1) {
            $('.loadingCARD').css('display', 'block');
        } else {
            $('.loadingCARD').css('display', 'none');
        }
    }

    function notFoundResult(type) {
        if (type == 1) {
            $('#searchNOTFOUND').css('display', 'block');
        } else {
            $('#searchNOTFOUND').css('display', 'none');
        }
    }

	function replaceUrl(url){
		url = url.replace(/https?:\/\//, "");
		return url;
	}

    function metaResponse(response) {
        var base_url = "<?= base_url('assets/profile/') ?>";
        let html = '';
        response.list.forEach(function(item) {
            bronze = item.country;
            html += card_template_start;
            html += base_url + item.image; // Mengganti base_url dengan path gambar
            html += card_template_company + item.company + card_template_mid;
            html += item.name + card_template_phone;
            html += item.phone_number + card_template_website;
            html += '<a href="'+item.website+'" target="_blank" style="color: blue;">'+replaceUrl(item.website)+'</a>' + card_template_payment;
            html += item.payment_option + card_template_address;
            html += item.address + card_template_end;

            if (item.whatsapp !== '') {
                html += footer_wa + item.whatsapp + footer_wa_icon;
            }
            if (item.telegram !== '') {
                html += footer_tele + item.telegram + footer_tele_icon;
            }

            html += '</div></div></div></div>'; // Tutup div footer dan card
        });
        if (html !== '') {
            $('#contentList').html(html)
            loadingCard(0)
			seeMore();
        }

    }

    function listreseller() {
        var base_url = "<?= base_url() ?>";
        $.ajax({
            url: base_url + 'Home/list',
            type: 'post',
            dataType: 'json',
            success: function(response) {

                if (response.found) {
                    $('#sellerContent').css('display', 'block');
                    $('#countrySUB').html(response.country)

                    metaResponse(response)
                }else{
					seeMore();
				}

            }
        });
    }

    function seeMore() {
        const cards = document.querySelectorAll('.card');

        const checkScrollability = card => {
            const contentCard = card.querySelector('.cards');
            const seeMoreButton = card.querySelector('.see-more');
            const gradientBlur = card.querySelector('.gradient-blur');
            const cardFooter = card.querySelector('.card-footer');
            const buttonsInFooter = cardFooter ? cardFooter.querySelectorAll('.btn') : [];

            let bottomValue = '30px';
            let heightValue = '50px';

            if (buttonsInFooter.length > 0) {
                if (window.matchMedia('(max-width: 767px)').matches) {
                    if (buttonsInFooter.length === 1) {
                        bottomValue = '75px';
                    } else if (buttonsInFooter.length === 2) {
                        bottomValue = '90px';
                    }
                } else {
                    bottomValue = '60px';
                }
                heightValue = '80px';
            }

            if (seeMoreButton) {
                seeMoreButton.style.bottom = bottomValue;
            }
            if (gradientBlur) gradientBlur.style.height = heightValue;

            if (seeMoreButton) {
                seeMoreButton.style.display = contentCard.scrollHeight > contentCard.clientHeight ?
                    'block' :
                    'none';
            }
        };

        cards.forEach(card => {
            checkScrollability(card);

            const seeMoreButton = card.querySelector('.see-more');
            const contentCard = card.querySelector('.cards');

            if (seeMoreButton) {
                seeMoreButton.addEventListener('click', function() {
                    card.classList.toggle('expanded');
                    const scrollTo = card.classList.contains('expanded') ? contentCard
                        .scrollHeight : 0;
                    const buttonText = card.classList.contains('expanded') ? 'See Less' :
                        'See More';
                    const buttonIcon = card.classList.contains('expanded') ?
                        'ti-chevrons-up' :
                        'ti-chevrons-down';

                    setTimeout(() => {
                        contentCard.scrollTo({
                            top: scrollTo,
                            behavior: 'smooth'
                        });
                    }, 300);
                    this.innerHTML = `<i class="ti ${buttonIcon} me-1"></i> ${buttonText}`;
                });
            }

            if (contentCard) {
                contentCard.addEventListener('scroll', function() {
                    this.style.padding = this.scrollTop > 0 ? '1rem 1rem 2rem 1rem' :
                        '1rem';
                });
            }

            card.addEventListener('mouseover', () => {
                const gradientBlur = card.querySelector('.gradient-blur');
                if (gradientBlur) gradientBlur.remove();
            });

            card.addEventListener('mouseout', () => {
                let gradientBlur = card.querySelector('.gradient-blur');
                if (!gradientBlur) {
                    gradientBlur = document.createElement('div');
                    gradientBlur.classList.add('gradient-blur');
                    card.appendChild(gradientBlur);
                }
                const cardFooter = card.querySelector('.card-footer');
                const buttonsInFooter = cardFooter ? cardFooter.querySelectorAll('.btn') : [];
                gradientBlur.style.height = buttonsInFooter.length > 0 ? '80px' : '50px';
            });
        });
    }


    $(document).ready(function() {
        loadingCard(1)
        listreseller()
    })
    </script>
</body>

</html>
