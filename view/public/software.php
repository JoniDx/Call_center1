<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu2.php") ?>

  <div class="container">
    <div class="col-lg-3 cler"><br><br>
      <div class="list-group">
        <button class="list-group-item list-group-item-danger" onclick="hideB()">Softwares</button>
        <button class="list-group-item list-group-item-danger" onclick="hideA()">Servicios</button>
      </div>
    </div>

    <div class="col-lg-9" id="WindowA" style="display:block;"><br>
      <?php for ($i=0;$i< sizeof($lstservicios);$i++) { $url = 'assets\img\services/'.$lstservicios[$i]["Nombre"].'.png'?>
      <div class="" >
        <?php
        $rest = $lstservicios[$i]["Descripcion"];
        $desc = substr($rest, 0, 150).'...';
         ?>
        <div class="col-sm-5 col-md-4" style="" >
          <div class="thumbnail">
            <img class="media-object imagen" src="<?php echo $url; ?>" onclick="window.location.href='<?php echo $lstservicios[$i]["Link"];?>'" ><br>
            <div class="caption container">
              <div class="col-lg-2 col-sm-5">
                <label for="" style="font-size:20px;"><?php echo $lstservicios[$i]["Nombre"];?></label> <br>
                <p style="width:200px; text-align:justify;"><?php echo $desc ;?></p> <br>
                <p style="width:200px"><button onclick="window.open('<?php echo $lstservicios[$i]["Link"];?>')" class="btn btn-danger btn-block clers" style="position:; "role="button">Infomacion</button></p><br>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php } ?>
    </div>

    <div class="col-lg-9" id="WindowB"  style="display:none;">
      <div class="" style="margin-top:85px;">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  CURSOS INSTITUCIONALES
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <img style="float:right; border-radius: 15px; margin-left:10px;" src="assets/img/services/institucional.jpg" alt=""><br>
		<H1>&nbsp;<H1>
                <h2>¿Qué son los cursos Institucionales?</h2><br>
                <p style="text-align:justify;">Son cursos enfocados a la capacitación y actualización de personal en instituciones educativas, gubernamentales, empresariales.</p><br>

                <br><h2 class="cler">¿Qué incluye este curso?</h2><br>
                <ul class="list-group">
                  <li class="list-group-item">Constancia de capacitación.</li>
                  <li class="list-group-item">Dinámicas, Materíal expositivo, Role-Play.</li>
                  <li class="list-group-item">Técnicas grupales, Técnicas instruccionales.</li>
                  <li class="list-group-item">Evaluación diagnóstica, Evaluación intermedia, Evaluación Final</li>
                  <li class="list-group-item">Reporte de entrenamiento.</li>
                  <li class="list-group-item">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="badge">25</span>
                     Cupo máximo.
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><span class="badge">5 horas</span>
                     Duración de curso - taller .
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  CURSOS DE DESARROLLO PERSONAL
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                <img style="float:right; border-radius: 15px; margin-left:10px;" src="assets/img/services/personal.jpg" alt=""><br>
		<H1>&nbsp;<H1>
                <h2>¿Qué es el desarrollo personal?</h2><br>
                <p style="text-align:justify;">Es un proceso de transformación mediante el cual una persona adopta nuevas ideas o formas de pensamiento, que le permiten generar nuevos comportamientos y actitudes, que dan como resultado un mejoramiento de su calidad de vida.</p><br>
                <br><h2 class="cler">¿Qué incluye este curso?</h2><br>
                <ul class="list-group">
                  <li class="list-group-item">Constancia de capacitación.</li>
                  <li class="list-group-item">Dinámicas, Materíal expositivo, Role-Play.</li>
                  <li class="list-group-item">Técnicas grupales, Técnicas instruccionales.</li>
                  <li class="list-group-item">Evaluación diagnóstica, Evaluación intermedia, Evaluación Final</li>
                  <li class="list-group-item">Reporte de entrenamiento.</li>
                  <li class="list-group-item">
                    <i class="fa fa-users" aria-hidden="true"></i><span class="badge">25</span>
                     Cupo máximo.
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><span class="badge">5 horas</span>
                     Duración de curso - taller .
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  RED CONOCER
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <br><img style="float:right; width:300px; height:250px; border-radius: 15px; margin-left:10px;" src="assets/img/services/conocer.jpg" alt=""><br>
		<H1>&nbsp;<H1>
                <h2>¿Qué es la certificación de competencias laborales?</h2><br>
                <p style="text-align:justify;">La certificación de competencia laboral es el proceso por medio del cual una persona demuestra su capacidad para desempeñar una función laboral y obtiene un reconocimiento con validez oficial en toda la República Mexicana que otorga el
                  Gobierno Federal a través del CONOCER. El proceso de certificación se lleva a cabo para cada candidato con base en los Estándares de Competencia elaborados por el sector productivo. Existen y se desarrollan constantemente estándares para
                  todo tipo de quehaceres que demanda el mercado de trabajo, por ejemplo, electricistas, meseros, recepcionistas, paramédicos, masajistas, instructores, soldadores, supervisores, promotores, entre otros.</p><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("view/overall/contactanos.php"); ?>
  <?php include("view/overall/footer.php"); ?>
  <script type="text/javascript">
    $(".js-modal-btn").modalVideo();
  </script>
</body>
