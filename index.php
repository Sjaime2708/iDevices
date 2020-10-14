<!DOCTYPE html>

<?php
include("sql_connect.php");
include("bloqueDeSeguridad.php");
session_start();
mysql_query("SET NAMES 'utf8'");
$n= $_SESSION['usuario'];
$d=$_SESSION['id_usuario'];
$sql_comp="Select cod_depto as c_ud,estatus,cod_cargo_func, nombre  as name,id_usuario as id from t_usuario where usuario='$n'";
$comp_e=mysql_query($sql_comp);
$fill_comp= mysql_fetch_array($comp_e);
 $nombre_comp=	$fill_comp['name'];
  $id_comp=	$fill_comp['id'];
$codu_comp=$fill_comp['c_ud'];

$sql_def="Select desc_unidad_ejecutora as dsc from t_unidad_ejecutora where cod_unidad_ejecutora=$codu_comp ";////////////////obtener nombre de la unidad ejecutora
$def_e=mysql_query($sql_def);
$fill_def= mysql_fetch_array($def_e);
$def_def=$fill_def['dsc'];
$status=$fill_comp['estatus'];
$switch=$fill_comp['cod_cargo_func'];
if($status==0){
$active="";

}
else{
$active="display:none";
}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Digepleu</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="row">
        <div class="col-sm-2">
            <img src="digepleul.png" width="60" height="60" style=""/>
        </div>
		<div class="container-fluid">
      <div class="col-sm-9">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Sistema para la Formulación del presupuesto</span> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_decode($def_def)?></a>
				<ul class="nav navbar-top-links navbar-right">


					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>

					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
  </div>
    </div>
  <!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo utf8_decode($nombre_comp) ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
      <li class=""><a href="index.php"><em class="fa fa-home">&nbsp;</em> Inicio</a></li>
      <?php if($switch==0){?>
			<li class=""><a href="poa_d.php"><em class="fa fa-calculator">&nbsp;</em> Plan Operativo Anual</a></li>

<?php }?>

<?php if($switch==1){?>

<li class="" ><a href=""><em class="fa fa-window-close">&nbsp;</em> Plan Operativo Cerrado</a></li>
<?php }?>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-clone">&nbsp;</em> Reportes PDF<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="download.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span> Plan Operativo Anual
					</a></li>
					<li><a class="" href="reporte_poagen.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span> Informe Detallado POA
					</a></li>
					<li><a class="" href="download_report.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span> Desglose Ant (001)
					</a></li>
					<li><a class="" href="download_report2.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span>Desglose Ant (071)
					</a></li>
					<li><a class="" href="download_report3.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span>Desglose Ant (072)
					</a></li>
					<li><a class="" href="download_report4.php" target="_blank">
						<span class="fa fa-arrow-right">&nbsp;</span>Desglose Ant (001-072)
					</a></li>

				</ul>
			</li>
      	<li class="parent "><a data-toggle="collapse" href="#sub-item-2" style="<?php echo $active; ?>">
			<em class="fa fa-bar-chart">&nbsp;</em> Administrador<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
</a>
        <ul class="children collapse" id="sub-item-2">
          <li><a class="" href="" >
            <span class="fa fa-area-chart">&nbsp;</span> Totales POA
          </a></li>
          <li><a class="" href="user_edit.php" >
            <span class="fa fa-user-plus">&nbsp;</span>Editar Usuario
          </a></li>
          <li><a class="" href="add_eje.php" >
            <span class="fa fa-file-text-o">&nbsp;</span> Editar Ejes
          </a></li>
          <li><a class="" href="" >
            <span class="fa fa-file-text-o">&nbsp;</span>Agregar Tipos
          </a></li>
          <li><a class="" href="" >
            <span class="fa fa-file-text-o">&nbsp;</span>Ojetos de Gasto
          </a></li>
          <li class="parent "><a data-toggle="collapse" href="#sub-item-7">
          <span data-toggle="collapse" href="#sub-item-7" class="fa fa-download"></span>&nbsp;Exportar&nbsp;<em class="fa fa-plus">&nbsp;</em>
</a>
<ul class="children collapse" id="sub-item-7">
              <li><a class="" href="re_poa_pdf_4.php"  target="_blank" >
                <span class="fa fa-file-text-o">&nbsp;</span>Totales POA Por Unidad
              </a></li>
            </ul>
          </a></li>



          <li><a class="" href="ed_depto.php" >
            <span class="fa fa-file-text">&nbsp;</span>Administrar Unidades
          </a></li>

        </ul>

      </li>
      <li><a href="confign.php"><em class="fa fa-cogs">&nbsp;</em> Cambiar Contraseña</a></li>
			<li><a href="close_session.php"><em class="fa fa-power-off">&nbsp;</em> Salir</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Sistema para la Formulación del Presupuesto</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sistema para la Formulación del Presupuesto</h1>
			</div>
		</div><!--/.row-->






		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default chat">
					<div class="panel-heading">
						Conceptos y Definiciones
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<ul>

              <li class="left clearfix"><span class="chat-img pull-left">
                <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Plan de Desarrollo</strong> <small class="text-muted"></small></div>
                  <p>Es una herramienta de planificación a largo plazo (5 años o más), que orientará el desarrollo estratégico de la institución, es decir marca la ruta de la gestión.</p>
                </div>
              </li>

							<li class="left clearfix"><span class="chat-img pull-left">
								<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">Eje Estratégico</strong> <small class="text-muted"></small></div>
									<p>Son las líneas básicas de desarrollo de la institución, que agrupan un objetivo o varios que tienen un ámbito común. Son coherentes con la Misión, la Visión y el FODA.</p>
								</div>
							</li>

							<li class="left clearfix"><span class="chat-img pull-left">
								<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">Objetivo Estratégico</strong> <small class="text-muted"></small></div>
									<p>Finalidades a conseguir para poder alcanzar la visión de futuro de la institución. Se trata de declaraciones amplias, no específicas, sin fecha.</p>
								</div>
							</li>

              <li class="left clearfix"><span class="chat-img pull-left">
								<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">Estratégias</strong> <small class="text-muted"></small></div>
									<p>Es el conjunto de acciones que se llevan a cabo para lograr el cumplimiento de los objetivos y metas institucionales, analizando detalladamente sus características internas como las de su entorno.</p>
								</div>
							</li>

              <li class="left clearfix"><span class="chat-img pull-left">
                <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Plan Operativo Anual</strong> <small class="text-muted"></small></div>
                  <p>Es una herramienta de planificación a corto plazo que debe estar perfectamente alineado con el plan de desarrollo y sirve para dar un ordenamiento lógico de las acciones que se proponen realizar, su aplicación permite optimizar el uso de los recursos disponibles y el cumplimiento de los objetivos y metas trazadas.  Contiene los objetivos,  acciones, resultados, indicadores, identifica los recursos y las fuentes de financiamiento.</p>
                </div>
              </li>


						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">

						</span></div>
					</div>
				</div>
				<div class="panel panel-default chat">
					<div class="panel-heading">
						Ayuda
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<ul class="todo-list">
              <li class="left clearfix"><span class="chat-img pull-left">
                <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Contactar</strong> <small class="text-muted"></small></div>
                  <p> Para mayor información llamar a la Unidad de Sistematización de la Información de DIGEPLEU</p>
                  <p><strong>523-5074</strong></p>
                </br>
                  <p>También puede contactar al Depto. de Presupuesto al</p>
                  <p><strong>523-5080 o 523-5075</strong></p>
                </div>
              </li>
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">

						</span></div>
					</div>
				</div>
			</div><!--/.col-->


			<div class="col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Instructivo
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Creación del Anteproyecto de Presupuesto</h4>
									</div>
									<div class="timeline-body">
										<p><strong>Paso1:</Strong> Dirigirse a la opción "Plan Operativo Anual" ubicado en el panel lateral izquierdo de la página.</p>
                    <p><strong>Paso2:</Strong> Llenar el formulario para la definición de los proyectos (<strong>Todos los campos son obligatorios</strong>).</p>
                      <p><strong>Paso3:</Strong> Luego oprima el botón de "GUARDAR".</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Añadir Recursos al Proyecto</h4>
									</div>
									<div class="timeline-body">
										<p><strong>Paso1:</Strong> Luego de guardar el proyecto, debemos situarnos en el botón más(+) que se encuentra definido dentro de la tabla justo al lado del nombre del proyecto en la parte inferior.</p>
                    <p><strong>Paso2:</Strong> Aparecerá una ventana donde debe llenar todos los campos para definir el recurso del proyecto y pulsamos el botón "ACEPTAR".</p>
                      <p><strong>Paso3:</Strong> Los Totales por recurso aparecerán definidos por fuentes al final del formulario.</p>
                        <p><strong>Observación</Strong> Para agregar más recursos al proyecto deben seleccionar el proyecto mediante el boton más (+).</p>
                  </div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-camera"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Edición de Proyectos</h4>
									</div>
									<div class="timeline-body">
                    <p><strong>Paso1:</Strong> Para editar los proyectos seleccionamos el botón "EDITAR" situado en cada proyecto de la tabla, recuerde que solo puede editar la descripción del proyecto (<strong>No implica los totales</strong>).</p>
                    <p><strong>Paso2:</Strong> Después de modificar el proyecto presionamos el botón "ACTUALIZAR" (<strong>No dejar espacios en blanco</strong>).</p>

									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-paperclip"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Edición de Recursos</h4>
									</div>
									<div class="timeline-body">
                    <p><strong>Paso1:</Strong> Los recursos se modifican seleccionando el botón más(+) de cada proyecto (<strong> Los recursos se modifican dentro del proyecto</strong>). </p>
                    <p><strong>Paso2:</Strong>  Seleccionamos el botón "EDITAR" de cada recurso definido dentro del proyecto.</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link"> <a href="https://www.medialoot.com"></a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
