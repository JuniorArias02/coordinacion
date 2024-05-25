<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FICHAS</h1>
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
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddModal">Agregar Nueva Ficha</button>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE PROGRAMA</th>
                                <th>NUMERO FICHA</th>
                                <th>FECHA INICIO</th>
                                <th>FECHA FINALIZACION</th>
                                <th>ESTADO</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                                <tr>
                                    <td><?php echo $row['id_Ficha'] ?></td>
                                    <td><?php echo $row['Nombre'] ?></td>
                                    <td><?php echo $row['Numero'] ?></td>
                                    <td><?php echo $row['Fecha_Inicio'] ?></td>
                                    <td><?php echo $row['Fecha_Finalizacion'] ?></td>
                                    <td><?php echo $row['Estado'] ?></td>
                                    <td>
                                        <div class="col-sm-4">
                                            <div class="d-flex justify-content-between">
                                                <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_Ficha').value = <?= $row['id_Ficha'] ?>;document.getElementById('update_Nombre').value = '<?= $row['Nombre'] ?>';document.getElementById('update_Numero').value = '<?= $row['Numero'] ?>';document.getElementById('update_Fecha_Inicio').value = '<?= $row['Fecha_Inicio'] ?>';document.getElementById('update_Fecha_Finalizacion').value = '<?= $row['Fecha_Finalizacion'] ?>';document.getElementById('update_Estado').value = '<?= $row['Estado'] ?>';" title="Editar Ficha" class="btn btn-sm btn-primary mr-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_Ficha').value = <?= $row['id_Ficha'] ?>;document.getElementById('delete_Nombre').value = '<?= $row['Nombre'] ?>';" title="Eliminar Ficha" class="btn btn-sm btn-danger mr-1">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
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
                <h4 class="modal-title" id="defaultModalLabel">Nueva Ficha</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=fichas" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_Nombre">Nombre</label>
                        <input type="text" name="add_Nombre" id="add_Nombre" placeholder="Nombre de Ficha" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_Numero">NUMERO</label>
                        <input type="text" name="add_Numero" id="add_Numero" placeholder="Numero De Ficha" class="form-control" required="required" minlength="7" maxlength="7">
                    </div>

                    <div class="form-group">
                        <label for="add_Fecha_Inicio">FECHA INICIO</label>
                        <input type="date" name="add_Fecha_Inicio" id="add_Fecha_Inicio" placeholder="Fecha Inicio" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="add_Fecha_Finalizacion">FECHA FINALIZACION</label>
                        <input type="date" name="add_Fecha_Finalizacion" id="add_Fecha_Finalizacion" placeholder="Fecha Finalizacion" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_Estado">ESTADO</label>
                        <select name="add_Estado" id="add_Estado" class="form-control" required="required">
                            <option value="">Seleccionar Estado</option>
                            <option value="Lectiva" class="lectiva">Lectiva</option>
                            <option value="Productiva" class="productiva">Productiva</option>
                            <option value="Finalizada" class="finalizada">Finalizada</option>
                        </select>
                        </div>
                          <!-- Botones centrados -->
                    <div class="text-center">
                        <input type="submit" name="add_fichas" Value="Registrar" class="btn btn-primary">
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

                <form action="panel.php?modulo=fichas" method="POST">
                    <input type="hidden" name="update_id_Ficha" id="update_id_Ficha" value="">
                    <div class="form-group">
                        <label for="update_Nombre">Nombre</label>
                        <input type="text" name="update_Nombre" id="update_Nombre" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_Numero">NUMERO</label>
                        <input type="text" name="apdate_Numero" id="update_Numero" placeholder="Numero De Ficha" class="form-control" required="required" pattern="[0-9]{7}">
                    </div>

                    <div class="form-group">
                        <label for="update_Fecha_Inico">FECHA INICIO</label>
                        <input type="date" name="update_Fecha_Inico" id="update_Fecha_Inico" class="form-control" required="required" maxlength="10" minlength="10">
                    </div>

                    <div class="form-group">
                        <label for="update_Fecha_Finalizacion">FECHA FINALIZACION</label>
                        <input type="date" name="update_Fecha_Finalizacion" id="update_Fecha_Finalizacion" class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                        <label for="update_Estado">ESTADO</label>
                        <select name="update_Estado" id="update_Estado" class="form-control" required="required">
                            <option value="">Seleccionar Estado</option>
                            <option value="Lectiva" class="lectiva">Lectiva</option>
                            <option value="Productiva" class="productiva">Productiva</option>
                            <option value="Finalizada" class="finalizada">Finalizada</option>
                        </select>
                    </div>

                    <input type="submit" name="update_fichas" id="update_fichas" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Ficha</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=fichas" method="POST">
                    <input type="hidden" name="delete_id_Ficha" id="delete_id_Ficha" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este ficha?</label>
                        <input type="text" name="delete_Nombre" id="delete_Nombre" class="form-control" readonly>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="delete_fichas" Value="Eliminar" class="btn btn-danger">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>