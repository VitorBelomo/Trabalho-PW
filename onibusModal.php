<h3>Lista de Ônibus - Abrindo detalhes no Modal</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Modelo</th>
            <th scope="col">Destino</th>
            <th>Ver detalhes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'class/Onibus.php';
        $onibus = new Onibus();
        $dados = $onibus->listar(NULL);
        $i = 0;
        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?= $mostrar['id'] ?></th>
                    <td><?= $mostrar['modelo'] ?></td>
                    <td><?= $mostrar['destino'] ?></td>
                    <td>
                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $i ?>">
                            Detalhes    
                        </button>
                    </td>
                </tr> 
                <!-- Modal -->
            <div class="modal fade" id="modal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $mostrar['modelo'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Modelo:</strong> <?= $mostrar['modelo'] ?></p>
                            <p><strong>Destino:</strong> <?= $mostrar['destino'] ?></p>
                            <p><strong>Lugares:</strong> <?= $mostrar['lugares'] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</tbody>
</table>
