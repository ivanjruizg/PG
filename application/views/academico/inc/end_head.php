</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=base_url('estudiante')?>" class="site_title"><i class="fa fa-home"></i> <span>FCBIA</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?=base_url()?>assets/img/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2><?php echo $this->session->userdata('nombres')?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />