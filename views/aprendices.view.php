<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Aprendices</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddModal">Nuevo Aprendiz</button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NUMERO FICHA</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>RENTA JOVEN</th>
                                    <th>BENEFICIOS BIENESTAR</th>
                                    <th>HISTORIAL</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                                    <tr>
                                        <td><?php echo $row['id_Aprendiz'] ?></td>
                                        <td><?php echo $row['Ficha'] ?></td>
                                        <td><?php echo $row['Nombre'] ?></td>
                                        <td><?php echo $row['Apellido'] ?></td>
                                        <td><?php echo $row['Renta_Joven'] ?></td>
                                        <td><?php echo $row['Beneficios_Bienestar'] ?></td>
                                        <td><?php echo $row['Historial'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_Aprendiz').value = <?= $row['id_Aprendiz'] ?>;document.getElementById('update_ficha').value = '<?= $row['Ficha'] ?>';document.getElementById('update_Nombre').value = '<?= $row['Nombre'] ?>';document.getElementById('update_Apellido').value = '<?= $row['Apellido'] ?>';document.getElementById('update_Renta_Joven').value = '<?= $row['Renta_Joven'] ?>';document.getElementById('update_Beneficios_Bienestar').value = '<?= $row['Beneficios_Bienestar'] ?>';document.getElementById('update_Historial').value = '<?= $row['Historial'] ?>';" title="Editar Ficha" class="btn btn-sm btn-primary mr-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_Aprendiz').value = <?= $row['id_Aprendiz'] ?>;document.getElementById('delete_Nombre').value = '<?= $row['Nombre'] ?>';" title="Eliminar Aprendiz" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->





    <!-- Modal para Ingresar -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="defaultModalLabel">Nueva Aprendiz</h4>
                </div>
                <div class="modal-body">
                    <form action="panel.php?modulo=aprendices" id="ingresar" method="POST">
                        <!-- Campo ficha -->
                        <!-- <div class="form-group">
                            <label for="add_Ficha">Ficha</label>
                            <input type="number" name="add_Ficha" id="add_Ficha" placeholder="Numero de ficha" class="form-control" required="required">
                        </div> -->
                        <label for="add_Ficha">Ficha</label>
                        <select name="add_Ficha" id="add_Ficha" class="form-control" required>
                            <option value="">Seleccione una ficha</option>
                            <?php
                            $query = "SELECT  id_Ficha ,Numero FROM fichas";
                            $result = mysqli_query($con, $query) or die(mysqli_error());
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['Numero'] . '">' . $row['Numero'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <label for="add_Nombre">NOMBRE</label>
                            <input type="text" name="add_Nombre" id="add_Nombre" placeholder="Nombre de Aprendiz" class="form-control" required="required">
                        </div>

                        <!-- Campo Apellido -->
                        <div class="form-group">
                            <label for="add_Apellido">APELLIDO</label>
                            <input type="text" name="add_Apellido" id="add_Apellido" placeholder="Apellido de Aprendiz" class="form-control" required="required">
                        </div>

                        <!-- Campo Renta Joven -->
                        <div class="form-group">
                            <label for="add_Renta_Joven">RENTA JOVEN</label>
                            <select name="add_Renta_Joven" id="add_Renta_Joven" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <!-- Campo Beneficios Bienestar -->
                        <div class="form-group">
                            <label for="add_Beneficios_Bienestar">BENEFICIOS BIENESTAR</label>
                            <select name="add_Beneficios_Bienestar" id="add_Beneficios_Bienestar" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Apoyo Económico – Monitorias">Apoyo Económico – Monitorias</option>
                                <option value="Alimentación">Alimentación</option>
                                <option value="Transporte">Transporte</option>
                            </select>
                        </div>

                        <!-- Campo Historial -->
                        <div class="form-group">
                            <label for="add_Historial">HISTORIAL</label>
                            <input type="text" name="add_Historial" id="add_Historial" placeholder="Historial" class="form-control" required="required">
                        </div>

                        <!-- Botones centrados -->
                        <div class="text-center">
                            <input type="submit" name="add_aprendices" Value="Registrar" class="btn btn-primary">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Modificar -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="defaultModalLabel">Editar Ficha</h4>
                </div>
                <div class="modal-body">

                    <form action="panel.php?modulo=aprendices" method="POST">
                        <input type="hidden" name="update_id_Aprendiz" id="update_id_Aprendiz" value="">

                        <div class="form-group">
                            <label for="update_ficha">Ficha</label>
                            <input type="text" name="update_ficha" id="update_ficha" placeholder="Numero de Ficha" class="form-control" required="required">
                        </div>


                        <div class="form-group">
                            <label for="update_Nombre">Nombre</label>
                            <input type="text" name="update_Nombre" id="update_Nombre" placeholder="Nombre Aprendiz" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="update_Apellido">APELLIDO</label>
                            <input type="text" name="update_Apellido" id="update_Apellido" placeholder="Apellido Aprendiz" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="update_Renta_Joven">RENTA JOVEN</label>
                            <select name="update_Renta_Joven" id="update_Renta_Joven" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="update_Beneficios_Bienestar">BENEFICIOS BIENESTAR</label>
                            <select name="update_Beneficios_Bienestar" id="update_Beneficios_Bienestar" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Apoyo Económico – Monitorias">Apoyo Económico – Monitorias</option>
                                <option value="Alimentación">Alimentación</option>
                                <option value="Transporte">Transporte</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="update_Historial">HISTORIAL</label>
                            <input type="text" name="update_Historial" id="update_Historial" placeholder="Historial" class="form-control" required="required">
                        </div>

                        <input type="submit" name="update_aprendices" id="update_aprendices" Value="Actualizar" class="btn btn-primary">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Eliminar -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title" id="defaultModalLabel">Eliminar Aprendiz</h4>
                </div>
                <div class="modal-body">
                    <form action="panel.php?modulo=aprendices" method="POST">
                        <input type="hidden" name="delete_id_Aprendiz" id="delete_id_Aprendiz" value="">
                        <div class="form-group">
                            <label>¿Seguro que deseas eliminar este aprendiz?</label>
                            <input type="text" name="delete_Nombre" id="delete_Nombre" class="form-control" readonly>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="delete_aprendices" Value="Eliminar" class="btn btn-danger">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>