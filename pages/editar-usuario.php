<h1>Editar Usuário</h1>
<?php 
$sql = "SELECT * FROM usuarios WHERE id=".$_REQUEST["id"];

//o meu resultado executa conexão com a query, chamando o $sql
$res = $conn->query($sql);
$row = $res->fetch_object();

?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?=$row->id?>">
    <div class="mb-3">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?=$row->nome?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=$row->email?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="senha-antiga">Senha Antiga</label>
        <input type="password" name="senha-antiga" id="senha" class="form-control" required> <!--Senha vem em branco, mas é obrigatória para finalizar a edição-->
    </div>
    <div class="mb-3">
        <label for="nova-senha">Nova Senha</label>
        <input type="password" name="nova-senha" id="senha" class="form-control" required> <!--Senha vem em branco, mas é obrigatória para finalizar a edição-->
    </div>
    <div class="mb-3">
        <label for="conf-nova-senha">Confirmar Nova Senha</label>
        <input type="password" name="conf-nova-senha" id="senha" class="form-control" required> <!--Senha vem em branco, mas é obrigatória para finalizar a edição-->
    </div>
    <div class="mb-3">
        <label for="data">Data de Nascimento</label>
        <input type="date" name="data_nasc" id="data_nasc" value="<?=$row->data_nasc?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>