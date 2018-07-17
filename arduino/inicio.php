
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Squarium & Arduino</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.1;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      /*-webkit-filter: grayscale(90%);
      filter: grayscale(90%);  make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage" style="font-family: Bradley Hand, cursive;">Squarium</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#peces">PECES</a></li>
        <li><a href="#contact">CONTÁCTANOS</a></li>
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-md-registrar" ><span class="glyphicon glyphicon-user"></span>REGISTRATE</a></li>
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-md" ><span class="glyphicon glyphicon-log-in"></span> INICIO SESIÓN </a></li>
      </ul>
    </div>
  </div>
</nav>

      <!--modal para iniciar sesión-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
         <h2 style="text-align: center;">INICIO SESIÓN</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/arduino/models/web.php" method="post" >
              <div class="form-group">
                <label class="control-label col-md-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="pwd">Contraseña:</label>
                <div class="col-sm-10">          
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-md-10">
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Recuérdame</label>
                  </div>
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Enviar</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
      <!--modal para registrarse-->
<div class="modal fade bs-example-modal-md-registrar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
         <h2>REGÍSTRATE</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/arduino/inicio.php" method="post">
              <div class="form-group">
                <label class="control-label col-md-2" for="nombre">Nombres:</label>
                <div class="col-sm-10">
                  <input type="nombre" class="form-control" id="nombre" placeholder="Nombres y Apellidos" name="nombre">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="ciudad">Ciudad:</label>
                <div class="col-sm-10">
                  <input type="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" name="ciudad">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="telefono">Teléfono:</label>
                <div class="col-sm-10">
                  <input type="telefono" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="email">E-Mail:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="pwd">Contraseña:</label>
                <div class="col-sm-10">          
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="pwd1">Confirmar:</label>
                <div class="col-sm-10">          
                  <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pwd1">
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" >Registrar</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/arduino/imagen/ny.png" alt="New York" width="1000" height="500">
        <div class="carousel-caption">
          <h3>Acuarios en Casa</h3>
          <p>Creatividad y Elegancia</p>
        </div>      
      </div>

      <div class="item">
        <img src="/arduino/imagen/chicago.jpg" alt="Chicago" width="1000" height="500">
        <div class="carousel-caption">
          <h3>Distracción</h3>
          <p>Espacio Relajante</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="/arduino/imagen/la.jpg" alt="Los Angeles" width="1000" height="500">
        <div class="carousel-caption">
          <h3>Reflexión</h3>
          <p>Ejemplo de Calma</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="peces" class="container text-center">
  <h3>LOS PECES</h3>
  <p><em>Caracteristicas</em></p>
  <p>Los peces (en latín pisces) son animales vertebrados primariamente acuáticos, generalmente ectotérmicos (regulan su temperatura a partir del medio ambiente) y con respiración por branquias. Suelen estar recubiertos por escamas, y están dotados de aletas, que permiten su movimiento continuo en los medios acuáticos, y branquias, con las que captan el oxígeno disuelto en el agua. El grupo Pisces no es un taxón porque sería parafilético. Los peces son abundantes tanto en agua salada como en agua dulce, pudiéndose encontrar especies desde los arroyos de montaña (por ejemplo, el gobio), así como en lo más profundo del océano (por ejemplo, anguilas tragonas).</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Pez Agua Dulce</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="/arduino/imagen/bandmember.jpg" class="img-rounded" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Guitarist and Lead Vocalist</p>
        <p>Loves long walks on the beach</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Pargo Rojo</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="/arduino/imagen/salado.jpg" class="img-rounded" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Drummer</p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Pez de Aguas Tropicales</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="/arduino/imagen/tropicales.jpg" class="img-rounded" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Bass player</p>
        <p>Loves math</p>
        <p>Member since 2005</p>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contactos</h3>
  <p class="text-center"><em>Emprendiendo para Innovar</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Comunicate con Nosotros</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Esmeraldas</p>
      <p><span class="glyphicon glyphicon-phone"></span>Telefonos: 0982000632; 0990986293; 0982122843; 0998644275</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: carolina.burbano@pucese.edu.ec; jenniffer.bautista@pucese.edu.ec; marlon.cedeño@pucese.edu.ec; mariana.pachay@pucese.edu.ec</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Enviar</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">Acerca de Nosotros</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Carolina</a></li>
    <li><a data-toggle="tab" href="#menu1">Jenniffer</a></li>
    <li><a data-toggle="tab" href="#menu2">Marlon</a></li>
    <li><a data-toggle="tab" href="#menu3">Mariana</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Carolina Burbano</h2>
      <p>Man, we've been on the road for some time now. Looking forward to lorem ipsum.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Jenniffer Bautista</h2>
      <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Marlon Cedeño</h2>
      <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h2>Mariana Pachay</h2>
      <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
    </div>
  </div>
</div>

<!-- Add Google Maps 
<div id="googleMap"></div>
<script>
function initMap() {
  var uluru = {lat: -25.344, lng: 131.036};
  var map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: uluru});
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
<script src="https://www.google.com.ec/maps/search/san+rafael+cerca+de+Esmeraldas/@0.9116764,-79.6933076,16z/data=!3m1!4b1?hl=es-419&authuser=0"></script>

To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.w3schools.com</a></p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
