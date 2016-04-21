<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> Inicio | RapiHealth </title>

	@include('pagina.principal.head')

</head>

<body>
	
	<!-- Incliur el nav -->

	@include('pagina.principal.nav')
	
	<!-- Banner -->
	<div class="banner">

		<script src="{{ asset('plugin/principal/js/responsiveslides.min.js') }}"></script>
		<script>
				// You can also use "$(window).load(function() {"
					$(function () {
				  // Slideshow1
				  $("#slider3").responsiveSlides({
				  	auto: true,
				  	pager: false,
				  	nav: true,
				  	speed: 500,
				  	namespace: "callbacks",
				  	before: function () {
				  		$('.events').append("<li>before event fired.</li>");
				  	},
				  	after: function () {
				  		$('.events').append("<li>after event fired.</li>");
				  	}
				  });

				});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>

							<img src="{{ asset('plugin/principal/images/banner1.jpg') }}" alt="" title=""/ >					
						</li>
					</ul>
				</div>	
			</div>
			<div class="clearfix"> </div>


			<!--work-->
			<div class="work">
				<div class="container">
					<div class="work-title">
						<h3><span>NUESTRO TRABAJO</span></h3>
					</div>
					<!--//End-slider-script -->
					<script src="{{ asset('plugin/principal/js/responsiveslides.min.js') }}"> </script>
					<script>
					// You can also use "$(window).load(function() {"
						$(function () {
					  // Slideshow 4
					  $("#slider4").responsiveSlides({
					  	auto:true,
					  	pager: false,
					  	nav: true,
					  	speed: 500,
					  	namespace: "callbacks",
					  	before: function () {
					  		$('.events').append("<li>before event fired.</li>");
					  	},
					  	after: function () {
					  		$('.events').append("<li>after event fired.</li>");
					  	}
					  });

					});
					</script>
					<div id="top" class="callbacks_container">
						<ul class="rslides" id="slider4">
							<li>
								<div class="work-grids">
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>SUPERDUPER</h4>
											<h3>WEBSITE</h3>
											<div class="work-image">
												<div class="work-gallery">	

													<img src="{{ asset('plugin/principal/images/img2.jpg') }}" alt="" title="img"/>
													<div class="figcaption">
														<a href="singlepage.html" class="cptn-top"> </a>
														<a href="singlepage.html" class="cptn-midle"> </a>
														<a href="singlepage.html" class="cpnt-btm"> </a>	
													</div>
												</div>
											</div>	
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327</li>
												<li><a href="#" class="chat">49</a></li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>ANOTHER PROJECT</h4>
											<h3>TITLE</h3>
											<div class="work-gallery">
												<img src="{{ asset('plugin/principal/images/img3.jpg') }}" alt="" title="image"/>
												<div class="figcaption">
													<a href="singlepage.html" class="cptn-top"> </a>
													<a href="singlepage.html" class="cptn-midle"> </a>
													<a href="singlepage.html" class="cpnt-btm"> </a>
												</div>			
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327 </li>
												<li><a href="#" class="chat">49</a> </li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>DESIGNE DWITH</h4>
											<h3>LOVE</h3>
											<div class="work-gallery">
												<img src="{{ asset('plugin/principal/images/img4.jpg') }}" alt="" title="image"/>
												<div class="figcaption">
													<a href="singlepage.html" class="cptn-top"> </a>
													<a href="singlepage.html" class="cptn-midle"> </a>
													<a href="singlepage.html" class="cpnt-btm"> </a>
												</div>			
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327 </li>
												<li><a href="#" class="chat">49</a> </li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="clearfix"> </div>
								</div>
							</li>
							<li>
								<div class="work-grids">
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>VERY NICE</h4>
											<h3>INDEED</h3>
											<div class="work-gallery">
												<img src="{{ asset('plugin/principal/images/img6.jpg') }}" alt="" title="image"/>
												<div class="figcaption">
													<a href="singlepage.html" class="cptn-top"> </a>
													<a href="singlepage.html" class="cptn-midle"> </a>
													<a href="singlepage.html" class="cpnt-btm"> </a>
												</div>			
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327 </li>
												<li><a href="#" class="chat">49</a> </li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>YET ANOTHER</h4>
											<h3>PROJECT</h3>
											<div class="work-gallery">
												<img src="{{ asset('plugin/principal/images/img7.jpg') }}" alt="" title="image"/>
												<div class="figcaption">
													<a href="singlepage.html" class="cptn-top"> </a>
													<a href="singlepage.html" class="cptn-midle"> </a>
													<a href="singlepage.html" class="cpnt-btm"> </a>
												</div>			
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327 </li>
												<li><a href="#" class="chat">49</a> </li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="work-grids-info">
										<div class="work-grids-text">
											<h4>ALMSOT LAST</h4>
											<h3>THING</h3>
											<div class="work-gallery">
												<img src="{{ asset('plugin/principal/images/img8.jpg') }}" alt="" title="image"/>
												<div class="figcaption">
													<a href="singlepage.html" class="cptn-top"> </a>
													<a href="singlepage.html" class="cptn-midle"> </a>
													<a href="singlepage.html" class="cpnt-btm"> </a>
												</div>			
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor.</p>
										</div>	
										<div class="work-like">
											<ul>
												<li><span class="eye"> </span>327 </li>
												<li><a href="#" class="chat">49</a> </li>
												<div class="clearfix"> </div>
											</ul>
										</div>
										<span class="work-captn"> </span>
									</div>
									<div class="clearfix"> </div>
								</div>
							</li>
						</ul>
					</div>	
				</div>
			</div>
			<!--//work-->

			<!--counting-->
			<div class="video">
				<div class="container">
					<h3>WHAT CAN<span>WE DO?</span></h3>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/f9CVzpMqIIs" frameborder="0" allowfullscreen> </iframe>		
				</div>	
			</div>
			<!--//counting-->

			<div class="content">
				<div class="container">
					<div class="content-grids">
						<div class="col-md-10 humble">
							<div class="work-title humble-title">
								<h3><span>NUESTROS PROFESIONALES</span></h3>
							</div>
							<div class="col-md-4 humble-grids">
								<div class="content-left">
									<a href="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
										<img class="img-responsive" src="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" width="10px" height="10" alt="" />
										<div class="b-wrapper">
											<h2 class="b-animate1 b-from-left    b-delay03 ">
												<img class="img-responsive" src="{{ asset('plugin/principal/images/icon10.png') }}" width="10" height="10" class="zoom" alt=""/>
											</h2>					
										</div>
									</a>
									<h4>Jhon Jairo Diaz Pérez</h4>
									<p>consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semperLorem ipsum dolor sit amet. </p>
									<a class="rd-more" href="singlepage.html">Read More</a>
								</div>
							</div>
							<div class="col-md-4 humble-grids">
								<div class="content-left">
									<a href="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
										<img class="img-responsive" src="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" width="10px" height="10" alt="" />
										<div class="b-wrapper">
											<h2 class="b-animate1 b-from-left    b-delay03 ">
												<img class="img-responsive" src="{{ asset('plugin/principal/images/icon10.png') }}" width="10" height="10" class="zoom" alt=""/>
											</h2>					
										</div>
									</a>
									<h4>Jhon Jairo Diaz Pérez</h4>
									<p>consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semperLorem ipsum dolor sit amet. </p>
									<a class="rd-more" href="singlepage.html">Read More</a>
								</div>
							</div>
							<div class="col-md-4 humble-grids">
								<div class="content-left">
									<a href="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" class="b-link-stripe b-animate-go   swipebox"  title="">
										<img class="img-responsive" src="{{ asset('plugin/principal/images/fotos/jhonjairo.jpg') }}" width="10px" height="10" alt="" />
										<div class="b-wrapper">
											<h2 class="b-animate1 b-from-left    b-delay03 ">
												<img class="img-responsive" src="{{ asset('plugin/principal/images/icon10.png') }}" width="10" height="10" class="zoom" alt=""/>
											</h2>					
										</div>
									</a>
									<h4>Jhon Jairo Diaz Pérez</h4>
									<p>consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semperLorem ipsum dolor sit amet. </p>
									<a class="rd-more" href="singlepage.html">Read More</a>
								</div>
							</div>

							<link rel="stylesheet" href="css/swipebox.css">
							<script src=" {{ asset('plugin/pagina/principal/js/jquery.swipebox.min.js') }}"></script> 
							<script type="text/javascript">
								jQuery(function($) {
									$(".swipebox").swipebox();
								});
							</script>
							<div class="clearfix"> </div>
						</div>			
						<div class="clearfix"> </div>
					</div>
				</div>	
			</div>

			@include('pagina.principal.footer')
			
		</body>
		<script src="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		</html>	