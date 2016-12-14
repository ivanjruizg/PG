<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Subir Propuesta</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"
                              action="<?= base_url('estudiante/subir') ?>" method="post"
                              enctype="multipart/form-data" novalidate>

                            <h2 class="section">Digite información de la propuesta</h2>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Título de la
                                    propuesta <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea id="titulo" required="required" name="titulo"
                                              class="form-control col-md-7 col-xs-12 texarea-titulo mayus"></textarea>

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Palabras
                                    Clave<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="textarea" required="required" name="palabras-clave"
                                              class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Resumen<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="resumen" required="required" name="resumen"
                                              class="form-control col-md-7 col-xs-12 texareaAlto mayus"></textarea>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo :<span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="tipo" id="tipo" class="form-control select" required>

                                        <option value="">Seleccione el tipo :</option>

                                        <?php


                                        foreach ($tipos as $tipo) {

                                            echo '<option value="' . $tipo['codigo'] . '">' . $tipo['nombre'] . '</option>';

                                        }

                                        ?>


                                    </select>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Investigador 1<span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="investigador1" disabled
                                           class="form-control col-md-7 col-xs-12 mayus"
                                           name="investigador1"
                                           value="<?= $this->session->userdata('nombres') . ' ' . $this->session->userdata('apellidos') ?>"
                                           required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Investigador 2
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="investigador2" class="form-control col-md-7 col-xs-12"
                                           placeholder="Digite el nombre del segundo investigador"
                                           type="text">

                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Correo Investigador 2
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="correo-investigador2" class="form-control col-md-7 col-xs-12"
                                           name="investigador2" readonly          type="email">

                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Investigador 3
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="investigador3" class="form-control col-md-7 col-xs-12"
                                           placeholder="Digite el nombre del tercer investigador"
                                           type="text">

                                </div>


                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Correo investigador 3
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input id="correo-investigador3" class="form-control col-md-7 col-xs-12"
                                           name="investigador3" readonly type="email">

                                </div>


                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 " id="" for="name">Documento
                                    propuesta<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <input id="propuesta" accept=".doc,.docx"
                                           class="form-control col-md-3 col-xs-12 input-typehead" name="propuesta"
                                           placeholder="Documento de propuesta" required="required" type="file">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 " id="" for="name">Documento
                                    carta remisión<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="carta" accept=".jpg,.jpeg,.gif,.png"
                                           class="form-control col-md-3 col-xs-12 input-typehead" name="carta"
                                           placeholder="Documento de propuesta" required="required" type="file">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>


                                    <input type="submit" class="btn btn-success" value="Subir">

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>

