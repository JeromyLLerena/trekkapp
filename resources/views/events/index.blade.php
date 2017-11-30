<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Shop :: w3layouts</title>
<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="{{asset('images/logo.png')}}" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="{{asset('images/nav.png')}}" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li class="current"><a href="shop.html">Shop</a></li>
						    	<li><a href="team.html">Team</a></li>
						    	<li><a href="experiance.html">Events</a></li>
						    	<li><a href="experiance.html">Experiance</a></li>
						    	<li><a href="shop.html">Company</a></li>
								<li><a href="contact.html">Contact</a></li>
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="{{asset('js/responsive-nav.js')}}"></script>
				    </div>
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
	    		  <!-- start search-->
				  <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="{{asset('js/classie.js')}}"></script>
						<script src="{{asset('js/uisearch.js')}}"></script>
				    <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						  <div class="product_control_buttons">
						  	<a href="#"><img src="{{asset('images/edit.png')}}" alt=""/></a>
						  		<a href="#"><img src="{{asset('images/close_edit.png')}}" alt=""/></a>
						  </div>
						   <div class="clear"></div>
						  <li class="list_img"><img src="{{asset('images/1.jpg')}}" alt=""/></li>
						  <li class="list_desc"><h4><a href="#">{{'Hola, ' . (auth()->guard('web')->check() ? auth()->guard('web')->user()->name : 'usuario') . '!'}}</a></h4><span class="actual">1 x
                          $12.00</span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="#">Mis reservas</a></div>
							 @if(auth()->guard('web')->check())
							 	<div class="login_button"><a href="{{route('auth.logout')}}">Logout</a></div>
							 @else
							 	<div class="login_button"><a href="{{route('auth.login')}}">Login</a></div>
							 @endif
							 <div class="clear"></div>
						  </div>
						  <div class="clear"></div>
						</ul>
					 </li>
				   </ul>
		        <div class="clear"></div>
	       </div>
	      </div>
		 </div>
	    </div>
	  </div>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row shop_box-top">
				@foreach($events as $event)
				<div class="col-md-3 shop_box" style="margin-bottom: 20px;"><a href="#">
					<img src="{{asset($event->photos->first()->url)}}" class="img-responsive" alt=""/>
					<span class="new-box">
						<span class="new-label">{{$event->current_instance->formatted_start_date}}</span>
					</span>
					<span class="sale-box">
						<span class="sale-label">{{$event->current_instance->status->name}}</span>
					</span>
					<div class="shop_desc">
						<h3><a href="#">{{$event->name}}</a></h3>
						<p>{{$event->desccription}} </p>
						<span class="reducedfrom">S/. {{$event->current_instance->price + 20.00}}</span>
						<span class="actual">S/. {{$event->current_instance->price}}</span><br>
						<ul class="buttons">
							<li class="cart"><a href="{{route('events.join', $event->id)}}">Unirse</a></li>
							<li class="shop_btn"><a href="#">ver</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</a></div>
				@endforeach
			</div>
		 </div>
	   </div>
	  </div>
	  <div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Products</h4>
							<li><a href="#">Mens</a></li>
							<li><a href="#">Womens</a></li>
							<li><a href="#">Youth</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>About</h4>
							<li><a href="#">Careers and internships</a></li>
							<li><a href="#">Sponserships</a></li>
							<li><a href="#">team</a></li>
							<li><a href="#">Catalog Request/Download</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Customer Support</h4>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Shipping and Order Tracking</a></li>
							<li><a href="#">Easy Returns</a></li>
							<li><a href="#">Warranty</a></li>
							<li><a href="#">Replacement Binding Parts</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Newsletter</h4>
							<div class="footer_search">
				    		   <form>
				    			<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
				    			<input type="submit" value="Go">
				    		   </form>
					        </div>
							<ul class="social">
							  <li class="facebook"><a href="#"><span> </span></a></li>
							  <li class="twitter"><a href="#"><span> </span></a></li>
							  <li class="instagram"><a href="#"><span> </span></a></li>
							  <li class="pinterest"><a href="#"><span> </span></a></li>
							  <li class="youtube"><a href="#"><span> </span></a></li>
						    </ul>

						</ul>
					</div>
				</div>
				<div class="row footer_bottom">
				    <div class="copy">
			           <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
		            </div>
					  <dl id="sample" class="dropdown">
				        <dt><a href="#"><span>Change Region</span></a></dt>
				        <dd>
				            <ul>
				                <li><a href="#">Australia<img class="flag" src="{{asset('images/as.png')}}" alt="" /><span class="value">AS</span></a></li>
				                <li><a href="#">Sri Lanka<img class="flag" src="{{asset('images/srl.png')}}" alt="" /><span class="value">SL</span></a></li>
				                <li><a href="#">Newziland<img class="flag" src="{{asset('images/nz.png')}}" alt="" /><span class="value">NZ</span></a></li>
				                <li><a href="#">Pakistan<img class="flag" src="{{asset('images/pk.png')}}" alt="" /><span class="value">Pk</span></a></li>
				                <li><a href="#">United Kingdom<img class="flag" src="{{asset('images/uk.png')}}" alt="" /><span class="value">UK</span></a></li>
				                <li><a href="#">United States<img class="flag" src="{{asset('images/us.png')}}" alt="" /><span class="value">US</span></a></li>
				            </ul>
				         </dd>
	   				  </dl>
   				</div>
			</div>
		</div>
</body>
</html>
