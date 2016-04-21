@extends('pagina.principal.principal')

@section('titulo', 'Funciones')


@section('contenido')	

<div class="portfolios">
	<div class="container">
		<div class="work-title">
			<h3>Nuestro<span>Portafolio</span></h3>
		</div>
		<ul id="filters" class="clearfix">
			<li><span class="filter active" data-filter="app card icon web">ALL</span></li>
			<li><span class="filter" data-filter="app">CATEGORY 1</span></li>
			<li><span class="filter" data-filter="card">CATEGORY 2</span></li>
			<li><span class="filter" data-filter="icon">CATEGORY 3</span></li>
			<li><span class="filter" data-filter="web">CATEGORY 4</span></li>
		</ul>
		<div id="portfoliolist">
			<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
				<div class="portfolio-wrapper">		
					<a href="{{ asset('plugin/pagina/principal/images/img19.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
						<img class="img-responsive" src="{{ asset('plugin/principal/images/img19.jpg') }}" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<img class="img-responsive" src="{{ asset('plugin/principal/images/e.png') }}" class="zoom" alt=""/>
							</h2>					
						</div>
					</a>
				</div>
			</div>				
			<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
				<div class="portfolio-wrapper">		
					<a href="{{ asset('plugin/pagina/principal/images/img20.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
						<img class="img-responsive" src="{{ asset('plugin/principal/images/img20.jpg') }}" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<img class="img-responsive" src="{{ asset('plugin/principal/images/e.png') }}" class="zoom" alt=""/></h2>

							</div></a>
						</div>
					</div>	
					<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">		
							<a href="{{ asset('plugin/principal/images/img21.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
								<img class="img-responsive" src="{{ asset('plugin/principal/images/img21.jpg') }}" />
								<div class="b-wrapper">
									<h2 class="b-animate b-from-left    b-delay03 ">
										<img class="img-responsive" src="{{ asset('plugin/principal/images/e.png') }}" class="zoom" alt=""/>
									</h2>

								</div></a>
							</div>
						</div>
						<div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="{{ asset('plugin/principal/images/img22.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
									<img class="img-responsive" src="{{ asset('plugin/principal/images/img22.jpg') }}" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left    b-delay03 ">
											<img class="img-responsive" src="{{ asset('plugin/principal/images/e.png') }}" class="zoom" alt=""/>
										</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="{{ asset('plugin/principal/images/img23.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
									<img class="img-responsive" src="{{ asset('plugin/principal/images/img23.jpg') }}" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left    b-delay03 ">
											<img class="img-responsive" src="{{ asset('plugin/principal/images/e.png') }}" class="zoom" alt=""/>
										</h2>
									</div>
								</a>
							</div>
						</div>				
					</div>	
					<script src="{{ asset('plugin/principal/js/jquery.swipebox.min.js') }}"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>

					<script type="text/javascript" src="{{ asset('plugin/principal/js/jquery.mixitup.min.js') }}"></script>
					<script type="text/javascript">
						$(function () {
							var filterList = {
								init: function () {

									$('#portfoliolist').mixitup({
										targetSelector: '.portfolio',
										filterSelector: '.filter',
										effects: ['fade'],
										easing: 'snap',

										onMixEnd: filterList.hoverEffect()
									});	
								},
								hoverEffect: function () {

									$('#portfoliolist .portfolio').hover(
										function () {
											$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
											$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
										},
										function () {
											$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
											$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
										}		
										);				
								}
							};

							filterList.init();
						});	
					</script>
				</div>				
			</div>
			<!--//portfolio-->

			@endsection

