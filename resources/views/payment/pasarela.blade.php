<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Register :: w3layouts</title>
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
		 <style>
		 	.submit {
				display: flex;
				justify-content: space-around;
			}
      .container {
        display: flex;
      }
      .detalle {
        margin-right: 25px;
      }
      .pago {
        width: 100%
      }
      .foto {
        margin: 15px;
      }

      .title {
        font-weight: bold;
      }

      .info {
        display: flex;
        flex-direction: column;
      }

      .parrafo {

      }
		 </style>
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
						  <a class="toggleMenu" href="#"><img src="{{asset('images/nav.png')}}"  alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="shop.html">Shop</a></li>
						    	<li><a href="team.html">Team</a></li>
						    	<li><a href="shop.html">Events</a></li>
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
								<form method="post" action="{{route('events.create')}}">
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
				     <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						  <div class="product_control_buttons">
						  	<a href="#"><img src="{{asset('images/edit.png')}}" alt=""/></a>
						  		<a href="#"><img src="{{asset('images/close_edit.png')}}" alt=""/></a>
						  </div>
						   <div class="clear"></div>
						  <li class="list_img"><img src="{{asset('images/1.jpg')}}" alt=""/></li>
						  <li class="list_desc"><h4><a href="#">velit esse molestie</a></h4><span class="actual">1 x
                          $12.00</span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="checkout.html">Check out</a></div>
							 <div class="login_button"><a href="login.html">Login</a></div>
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
          <div class="detalle">
            <p>DETALLE</p>
            <img  class="foto" src="{{asset($event->photos->first()->url)}}" alt=""/>
            <div class="info">
              <div class="parrafo">
                <span class="title">Producto:</span>
                <span> {{$event->name}} </span>
              </div>
              <div>
                <span class="title">Fecha: </span>
                <span>{{$event->current_instance->start_date}}</span>
              </div>
              <div>
                <span class="title">Precio unitario</span>
                <span>{{$event->current_instance->price}} PEN </span>
              </div>
              <div>
                <span class="title">Precio total</span>
                <span>{{$event->current_instance->price}} PEN</span>
              </div>
            </div>
          </div>
						<form id="culqi-card-form" method="post" action="{{route('events.join', $event->id)}}">
								{!! csrf_field() !!}
                                <input type="hidden" name="culqi_token" required>
                                <div class="pago">
										<h3>PAGO</h3>
                    <div>
                      <div>
                        Número de tarjeta:
                        <input type="text" class="form-control txtdes" placeholder="Número de Tarjeta" data-culqi="card[number]" id="card[number]" data-error="Ingrese Numero Tarjeta" name="cardNumber"  maxlength="19" required>
                      </div>
                      <div>
                        CVV:
                        <input type="text" name="cvv" class="form-control cvc" placeholder="CVV" data-culqi="card[cvv]" id="card[cvv]" required>
                      </div>
                      <div>
                        Mes de expiración
                        <input type="text" name="m_exp" class="form-control mesano" placeholder="Mes expiración" data-culqi="card[exp_month]" id="card[exp_month]" required>
                      </div>
                      <div>
                        Año de expiración
                        <input type="text" name="a_exp" class="form-control mesano" placeholder="Año expiración" data-culqi="card[exp_year]" id="card[exp_year]" required>
                      </div>
                      <div>
                        Email
                        <input type="text" class="form-control txtdes" name="email" data-culqi="card[email]" id="card[email]" placeholder="Email" required>
                      </div>
                      <div>
                        Nombre de tarjeta
                        <input type="text" class="form-control txtdes" name="name" placeholder="Nombre de la Tarjeta" required>
                      </div>
                    </div>
                               </div>
             <div class="submit">
                 <button type="submit" class="confirm-pay btn btn-primary">Confirmar</button>
                 <a type="button" class="btn btn-danger">Cancelar</a>
             </div>
						</form>
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
<script src="https://checkout.culqi.com/v2"></script>
<script type="text/javascript">
    Culqi.publicKey = "{{env('CULQI_PUBLIC_KEY')}}";
    Culqi.init();

    $('.confirm-pay').click(function(e){
        e.preventDefault();
        $(':input[type="submit"]').prop('disabled', true);
        Culqi.createToken();
    })

    function culqi() {
         
        if (Culqi.token) { // ¡Token creado exitosamente!
            // Get the token ID:
            var token = Culqi.token.id;
            console.log('Se ha creado un token:' + token);
            $('input[name="culqi_token"]').val(token);
            window.setTimeout($('#culqi-card-form').submit(), 3000);

        } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.mensaje);
        }
    };

</script>
</body>
</html>
