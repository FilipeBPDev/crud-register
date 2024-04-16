<h1>lista usuarios</h1>
<?php
$sql = "SELECT * FROM usuarios";

$res = $conn->query($sql);

$qtd = $res->num_rows;    #quantidade resultados = numero de linhas do resultado.

if ($qtd > 0) {
    $headers = ["#", "Nome", "Email", "Data de Nascimento", "Ações"];
    echo "<table class = 'table table-hover table-striped table-bordered'>";
    echo "<tr>";
    foreach($headers as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";
    while ($row = $res->fetch_object()) {        #os dados serão armazenados em $row
        echo "<tr>";
        foreach ($row as $chave => $valor) {
            if ($chave !== "senha") {
                echo  "<td>  " . $valor . " </td>";
            }
        }
        echo "<br>";
        echo "<td>
            <button onclick = \"location.href='?page=editar&id=".$row->id."';\"
            class = 'btn btn-success'>Editar</button>

            <button onclick = \"if(confirm('Tem certeza que deseja excluir?')){
                location.href='?page=salvar&acao=excluir&id=".$row->id."';
            } else {false}\"     
            class = 'btn btn-danger'>Excluir</button>
                </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class = 'alert alert-danger'>Não encontrou nenhum resultado</p>";
}
?>