<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="cHead">N°</th>
            <th class="cHead">Categoría</th>
            <th colspan="3" class="cHead">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataCate as $result) : ?>
            <tr class="cHead">
                <td> <?php echo $cont += 1; ?></td>
                <td> <?php echo $result['categoria']; ?></td>
                <td>
                    <a href="" class="btn btn-success upd-categoria" data-toggle="modal" id_categoria="<?php echo $result['id_categoria']; ?>" > <i class="fas fa-user-edit"></i></a>
                </td>
                <td>
                    <a href="" class="btn btn-danger btnDrop-Cate eliminar-sys1 " id_categoria="<?php echo $result['id_categoria']; ?>"> <i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>