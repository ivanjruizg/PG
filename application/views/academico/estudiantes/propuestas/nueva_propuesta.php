<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Presentar propuesta</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left" action="<?= base_url('estudiante/subir') ?>"
                              method="post"
                              enctype="multipart/form-data">



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Título de la
                                    propuesta <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea id="titulo" required="required" name="titulo"
                                              class="form-control col-md-7 col-xs-12 texarea-titulo mayus"></textarea>

                                </div>
                            </div>



                            <div class="control-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Palabras claves  <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <input id="tags_1" name="palabras-clave" type="text" class="tags form-control" value="" />
                                    <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                </div>
                            </div>

                            <div class="clearfix">

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
                                           required type="text">
                                </div>

                                <div class="col-md-1">


                                <div class="col-md-6">
                                    <button type="button" onclick="añadirInvestigador()" class="btn btn-sm">

                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>


                                </div>

                                    <div class="col-md-6">
                                        <button type="button" id="quitar-investigador" onclick="quitarInvestigador()" class="btn btn-sm">

                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>


                                    </div>

                                </div>



                            </div>

                            <div class="item form-group inv2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Investigador 2
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="investigador2" class="form-control col-md-7 col-xs-12"
                                           placeholder="Digite el nombre del segundo investigador"
                                           type="text">

                                </div>
                            </div>

                            <div class="item form-group inv2">

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="correo-investigador2" class="form-control col-md-7 col-xs-12"
                                           name="investigador2" readonly type="hidden">

                                </div>
                            </div>


                            <div class="item form-group inv3">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Investigador 3
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="investigador3" class="form-control col-md-7 col-xs-12"
                                           placeholder="Digite el nombre del tercer investigador"
                                           type="text">

                                </div>


                            </div>


                            <div class="item form-group inv3">

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="correo-investigador3" class="form-control col-md-7 col-xs-12"
                                           name="investigador3" readonly type="hidden">

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

