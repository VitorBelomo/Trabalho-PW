<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Passageiro.php';
$passageiro = new Passageiro();
$titulo = $id ? "Editar" : "Cadastrar";

if ($id) {
    $dados = $passageiro->listar($id)[0];
    $passageiro->setId($dados['ID Passageiro']);
    $passageiro->setNome($dados['Nome']);
    $passageiro->setData_nascimento($dados['Data de Nascimento']);
}
?>
<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        <?= $titulo ?> Passageiro  
    </h3>  
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Nome
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="50" minlength="3" value="<?= $passageiro->getNome() ?>" />
                </div>
            </div>           
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Data de Nascimento
                </label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" id="txtdata_nascimento" name="txtdata_nascimento" value="<?= $passageiro->getData_nascimento() ?>" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" 
                           class="btn btn-primary m-3" 
                           name="btnsalvar" 
                           id="btnsalvar" 
                           value="Salvar" />
                    <a class="btn btn-danger" href="?p=passageiro/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $data_nascimento = filter_input(INPUT_POST, 'txtdata_nascimento');

    $passageiro->setNome($nome);
    $passageiro->setData_nascimento($data_nascimento);

    $opcao = $id ? 1 : 0;

    echo '<div class="alert alert-primary mt-3" role="alert">'
    . $passageiro->crud($opcao)
    . '</div>';
}
?>
