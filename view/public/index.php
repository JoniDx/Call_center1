<?php include("view/overall/head.php"); ?>
<body>

  <?php
   $_SESSION["IdUsuario"] = "";
   $_SESSION["IdSesion"] = '1';
  if ($_SESSION["IdUsuario"] == "" ){
    $_SESSION["IdSesion"] = '0';
  }?>

  <?php if ($_SESSION["IdUsuario"]==""){
    include("view/overall/menu.php");
  } ?>

  <section id="home" class="welcome-hero">
    <?php if ($_SESSION["IdUsuario"]!=""){
      include("view/overall/menu.php");
    } ?>

    <div class="container">
      <div class="welcome-hero-txt">
        <h2> Encuentra la mejor experiencia de negocio <br> todo lo que necesitas </h2>
      </div>
      <center class="cler">
        <button class="js-modal-btn welcome-hero-btn" data-video-id="Q1GS931ErIc" style="font-size:40px; width:280px; height:80px"> <i class="fa fa-play" aria-hidden="true"></i>
          <label> &nbsp;Infórmate </label>
        </button>
      </center>
      <!-- <div class="welcome-hero-serch-box">
          <div class="welcome-hero-serch">
          </div>
      </div> -->
    </div>
  </section>

  <section id="works" class="works cler">
    <div class="container">
      <div class="section-header">
        <h2>Como trabajamos</h2>
        <p>Conoce más de nuestro trabajo en nuestro sitio web</p>
      </div><!--/.section-header-->
      <div class="works-content">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="single-how-works">
              <div class="single-how-works-icon">
                <i class="flaticon-lightbulb-idea"></i>
              </div>
              <h2><a href="https://mwc.com.mx/?view=software">Elije <span> nuestros sistemas</span> </a></h2>
              <p style="font-size:13px;  text-align:justify;">
                Ofrecemos cualquier tipo de solución tecnológica que nuestros clientes necesiten, desde ERPs, Suites, Sistemas hasta Desarrollos a la medida.
              </p>
              <button class="welcome-hero-btn how-work-btn" onclick="window.open('https://mwc.com.mx/?view=software')">
                leer más
              </button>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-how-works">
              <div class="single-how-works-icon">
                <i class="flaticon-lightbulb-idea"></i>
              </div>
              <h2><a href="https://mwc.com.mx/?view=consultoria">Cosultorias <span> y Coaching </span></a></h2>
              <p style="font-size:12px; text-align:justify;">
                Nuestra meta es que nuestros clientes, aprendan de nuestros métodos de manera que después de terminar nuestra labor, el conocimiento que impartimos permanezca con ellos.
              </p>
              <button class="welcome-hero-btn how-work-btn" onclick="window.open('https://mwc.com.mx/?view=consultoria')">
                leer más
              </button>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-how-works">
              <div class="single-how-works-icon">
                <i class="flaticon-lightbulb-idea"></i>
              </div>
              <h2><a href="https://mwc.com.mx/?view=nosotros">Más <span> acerca de nosotros</span> </a></h2>
              <p style="font-size:12px; text-align:justify;">
                Tenemos más de 20 años trabajando en el mercado, y esa amplia experiencia es uno de nuestros recursos más valiosos, al hacer nuestro trabajo.
              </p>
              <button class="welcome-hero-btn how-work-btn" onclick="window.open('https://mwc.com.mx/?view=nosotros')">
                leer más
              </button>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.container-->
  </section><!--/.works-->

  <section id="statistics"  class="statistics">
    <div class="">
      <div class="statistics-counter">
        <div class="col-md-3 col-sm-6">
          <div class="single-ststistics-box">
            <div class="statistics-content">
              <div class="counter"> 20 </div> <span>+</span>
            </div><!--/.statistics-content-->
            <label style="font-size:20px; color:white;">Años de experiencia</label>
          </div><!--/.single-ststistics-box-->
        </div><!--/.col-->
        <div class="col-md-3 col-sm-6">
          <div class="single-ststistics-box">
            <div class="statistics-content">
              <div class="counter">50</div> <span>+</span>
            </div><!--/.statistics-content-->
            <label style="font-size:20px; color:white;">Clientes satisfechos</label>
          </div><!--/.single-ststistics-box-->
        </div><!--/.col-->
        <div class="col-md-6 col-sm-6">
          <div class="single-ststistics-box">
            <div class="statistics-content">
              <p style="color:white; text-align:justify;">
                MW Consultores ofrece servicios consultivos que inician con un diagnóstico al cliente, posteriormente se construyen “soluciones con reglas de negocio” a la medida, siendo éstas específicas y únicas con alcances claros en el corto y mediano plazo, implementando soluciones basadas en procesos eficientes y/o tecnología de vanguardia.
              </p>
            </div><!--/.statistics-content-->
          </div><!--/.single-ststistics-box-->
        </div><!--/.col-->
      </div><!--/.statistics-counter-->
    </div><!--/.container-->

  </section><!--/.counter-->


  <?php include("view/overall/footer.php"); ?>
  <script type="text/javascript">
    window.onload = function udp(){

    }
  </script>
  <script type="text/javascript">
  $(".js-modal-btn").modalVideo();
  </script>
</body>
