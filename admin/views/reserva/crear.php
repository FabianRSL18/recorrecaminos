<?php require('views/header.php'); ?>
<h1><?php if ($accion == "crear"): echo("Nuevo"); else: echo("Modificar"); endif; ?> Reservas</h1>
<form action="reserva.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
    <div class="row mb-3">
        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
        <div class="col-sm-10">
            <input type="text" name="data[estado]" placeholder="Escribe aquí el estado" class="form-control" value="<?php if (isset($reservas['estado'])): echo($reservas['estado']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fecha_reserva" class="col-sm-2 col-form-label">Fecha Reserva</label>
        <div class="col-sm-10">
            <input type="date" name="data[fecha_reserva]" placeholder="Escribe aquí el fecha_reserva" class="form-control" value="<?php if (isset($reservas['fecha_reserva'])): echo($reservas['fecha_reserva']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fecha_salida" class="col-sm-2 col-form-label">Fecha Salida</label>
        <div class="col-sm-10">
            <input type="date" name="data[fecha_salida]" class="form-control" value="<?php if (isset($reservas['fecha_salida'])): echo($reservas['fecha_salida']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fecha_regreso" class="col-sm-2 col-form-label">Fecha Regreso</label>
        <div class="col-sm-10">
            <input type="date" name="data[fecha_regreso]" placeholder="Escribe aquí la fecha_regreso" class="form-control" value="<?php if (isset($reservas['fecha_regreso'])): echo($reservas['fecha_regreso']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="destino" class="col-sm-2 col-form-label">Destino</label>
        <div class="col-sm-10">
            <input type="text" name="data[destino]" class="form-control" value="<?php if (isset($reservas['destino'])): echo($reservas['destino']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="id_cliente" class="col-sm-2 col-form-label">Cliente</label>
        <select name="data[id_cliente]" id="" class="form-select">
            <?php foreach($clientes as $cliente):?>
                <?php 
                $selected = "";
                if($reservas['id_cliente'] == $cliente['id_cliente']){
                    $selected = "selected";
                }
                ?>
            <option value="<?php echo($cliente['id_cliente']); ?>" <?php echo($selected);?>><?php echo($cliente['nombre']); ?></option>
            <?php endforeach; ?>
        </select>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
