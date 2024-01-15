<?php
    if(!isset($_SESSION)){
        session_start();
        if(!isset($_SESSION['usuario'])){
            die('Você não está logado!' . '<a href="login.php">Clique aqui para logar</a>');
        }    
}
    include('conexao.php');
    $id = $_SESSION['usuario'];
    $sqlcode = "SELECT * FROM clientes WHERE id = '$id'";
    $query = $mysqli->query($sqlcode);
    $cliente = $query->fetch_assoc();

    function formatar_data($data){
        return implode('/', array_reverse(explode('-', $data)));
    };
    // FORMATAR TELEFONE PARA VISUALIZAÇÃO COM CARACTERES
    function formatar_telefone($telefone){
        $ddd = substr ($telefone, 0, 2);
        $parte1 = substr ($telefone, 2, 5);
        $parte2 = substr ($telefone, 7);
        return "($ddd) $parte1-$parte2";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sant imports</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="normalize.css">
</head>

<body >
    <!-- Header  *NAV* - Mensagem central superior -->
    <header class="h-g">
        <form class="h-f">
            <p>Text tittle</p>
        </form>
    <!-- *HEADER* Menu & Logo central  -->
        <img onclick="lmenu()" class="h-img" src="imagens/hamburger.png">
        <div id="lh" class="h-menu"><br>
            <a onclick="fmenu()">X</a>
            <a>Menu de configuções</a>
            <br><br>
            <a>Menu1</a><hr><br>
            <a href="logout.php">Encerrar sessão</a>
          
            <input type="text" id="search-bar" placeholder="Busca">
            <a><img class="input-lupa"src="imagens/pesquisa-de-lupa.png"></a>
                <div class="icons">
                    <img src="imagens/instagram.png">
                    <img src="imagens/facebook.png">
                    <img src="imagens/tiktok.png">
                    <img src="imagens/youtube.png">
                    <img src="imagens/whatsapp.png">
                </div>
        </div>

        <p>Olá, <b><?php echo $cliente['nome']?></b></p>
        <p></p>
    </header>
    <div class="nav-g">
        <a href="http://127.0.0.1/projetoCadastro/cadastrar_cliente.php">Cadastrar cliente</a>
    </div>
 
    <div class="center">

    <div class="div-nav">
        <h1>Usuários</h1>
        <a href="usuarios.php"><img class="img-nav"src="imagens/modelo1.jpg">
    </div>

    <div class="div-nav">
        <h1>Listagem de pacientes</h1>
        <a href="pacientes.php"><img class="img-nav"src="imagens/modelo2.jpg">
    </div>
    
    <div class="div-nav">
        <h1>Listagem de pacientes</h1>
        <a href="cadastro_paciente.php"><img class="img-nav"src="imagens/modelo3.jpg">
    </div>

    <script src="index.js"></script>
</body>
</html>
