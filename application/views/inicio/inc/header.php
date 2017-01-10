<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="author" content="cosmic">
    <meta name="keywords" content="Bootstrap 3, Template, Theme, Responsive, Corporate, Business">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico">

    <title> <?php echo $titulo?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!--external css-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">

    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style-inicio.css" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/parallax-slider/parallax-slider.css')?>" />
    <script type="text/javascript" src="<?=base_url('assets/js/parallax-slider/modernizr.custom.28468.js')?>">    </script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->






    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />



    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<!--header start-->
<header class="head-section">
    <div class="navbar navbar-default navbar-static-top container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo-cecar.png" class="img-responsive " alt="" /></a>


        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li>
                    <a href="<?php echo base_url();?>">INICIO</a>
                </li>

                <li>
                    <a href="<?php echo base_url('documentacion');?>">DOCUMENTOS</a>
                </li>




                <li class="dropdown">
                    <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                    "dropdown" data-toggle="dropdown" href="#">INSCRIPCION <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="registrar-estudiante">ESTUDIANTES</a>
                        </li>
                        <li>
                            <a href="button.html">DOCENTES</a>
                        </li>
                        <li>

                    </ul>
                </li>

                <li>
                    <a href="<?=base_url('iniciar-sesion')?>">PORTAL</a>
                </li>

            </ul>
        </div>
    </div>
</header>
<!--header end-->