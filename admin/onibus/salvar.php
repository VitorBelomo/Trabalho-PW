<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Onibus.php';
$onibus = new Onibus();
$titulo = $id ? "Editar" : "Cadastrar";

if ($id) {
    $dados = $onibus->listar($id)[0];
    $onibus->setId($dados['ID Ônibus']);
    $onibus->setModelo($dados['Modelo']);
    $onibus->setLugares($dados['Lugares']);
    $onibus->setDestino($dados['Destino']);
}
?>
<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        <?= $titulo ?> Ônibus  
    </h3>  
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Modelo
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtmodelo" name="txtmodelo" placeholder="Digite o modelo" maxlength="50" minlength="3" value="<?= $onibus->getModelo() ?>" />
                </div>
            </div>           
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Lugares
                </label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="txtlugares" name="txtlugares" value="<?= $onibus->getLugares() ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Destino
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtdestino" name="txtdestino" placeholder="Digite o destino" value="<?= $onibus->getDestino() ?>" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" 
                           class="btn btn-primary m-3" 
                           name="btnsalvar" 
                           id="btnsalvar" 
                           value="Salvar" />
                    <a class="btn btn-danger" href="?p=onibus/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $modelo = filter_input(INPUT_POST, 'txtmodelo');
    $lugares = filter_input(INPUT_POST, 'txtlugares');
    $destino = filter_input(INPUT_POST, 'txtdestino');

    $onibus->setModelo($modelo);
    $onibus->setLugares($lugares);
    $onibus->setDestino($destino);

    $opcao = $id ? 1 : 0;

    echo '<div class="alert alert-primary mt-3" role="alert">'
    . $onibus->crud($opcao)
    . '</div>';
}
?>
