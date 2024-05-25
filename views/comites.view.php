<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comités</h1>
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
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddModal">Agregar Nueva Aprendiz</button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>ID</th>
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
                                        <td><?php echo $row['Nombre'] ?></td>
                                        <td><?php echo $row['Apellido'] ?></td>
                                        <td><?php echo $row['Renta_Joven'] ?></td>
                                        <td><?php echo $row['Beneficios_Bienestar'] ?></td>
                                        <td><?php echo $row['Historial'] ?></td>
                                        <td>
                                                <div class="col-sm-4">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_Aprendiz').value = <?= $row['id_Aprendiz'] ?>;document.getElementById('update_Nombre').value = '<?= $row['Nombre'] ?>';document.getElementById('update_Apellido').value = '<?= $row['Apellido'] ?>';document.getElementById('update_Renta_Joven').value = '<?= $row['Renta_Joven'] ?>';document.getElementById('update_Beneficios_Bienestar').value = '<?= $row['Beneficios_Bienestar'] ?>';document.getElementById('update_Historial').value = '<?= $row['Historial'] ?>';" title="Editar Ficha"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_Aprendiz').value = <?= $row['id_Aprendiz'] ?>;document.getElementById('delete_Nombre').value = '<?= $row['Nombre'] ?>';" title="Eliminar Aprendiz" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
</div>
<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Nueva Aprendiz</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=aprendices" id="ingresar" method="POST">
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
            <!-- Contenido del modal para editar comité -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Comité</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=comites" method="POST">
                    <input type="hidden" name="update_id_Comite" id="update_id_Comite" value="">
                    <div class="form-group">
                        <label for="update_Descripcion">Descripción</label>
                        <input type="text" name="update_Descripcion" id="update_Descripcion" placeholder="Descripción del Comité" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_Medidad_Tomadas">Medidas Tomadas</label>
                        <input type="text" name="update_Medidad_Tomadas" id="update_Medidad_Tomadas" placeholder="Medidas Tomadas" class="form-control" required="required">
                    </div>

                    <div class="text-center">
                        <input type="submit" name="update_comites" Value="Actualizar" class="btn btn-primary">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Contenido del modal para eliminar comité -->
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Comité</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=comites" method="POST">
                    <input type="hidden" name="delete_id_Comite" id="delete_id_Comite" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Comité?</label>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="delete_comites" Value="Eliminar" class="btn btn-danger">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
