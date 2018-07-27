<!DOCTYPE html>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "utils/FormUtils.php";
require_once "entidade/Entidade.php";
require_once "entidade/Curriculo.php";
require_once "entidade/Usuario.php";
require_once "controle/Controller.php";
require_once "controle/CurriculoController.php";
require_once "controle/UsuarioController.php";

$acao = filter_input(INPUT_POST, "acao");
if (isset($acao)) {
    $idUsuario = 0;
    $id = 0;
    $login = filter_input(INPUT_POST, "login");
    $senha = filter_input(INPUT_POST, "senha");
    $email = filter_input(INPUT_POST, "email");
    $nome = filter_input(INPUT_POST, "nome");
    $cpf = filter_input(INPUT_POST, "cpf");
    $dataNascimento = FormUtils::
            convertToDatabaseDate(filter_input(INPUT_POST, "dataNascimento"));
    $sexo = filter_input(INPUT_POST, "sexo");
    $estadoCivil = filter_input(INPUT_POST, "estadoCivil");
    $escolaridade = filter_input(INPUT_POST, "escolaridade");
    $especializacoes = filter_input(INPUT_POST, "especializacoes");
    $experienciasProfissionais = 
            filter_input(INPUT_POST, "experienciasProfissionais");
    if (FormUtils::isInsert($acao)) {
        $dataCadastro = date("Y-m-d h:i:s");
    } else {
        $id = filter_input(INPUT_POST, "id");
        $idUsuario = filter_input(INPUT_SESSION, "idUsuario");
    }
    $usuario = new Usuario();
    $usuario->setId($idUsuario);
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $usuario->setEmail($email);
    $usuarioController = new UsuarioController();
    $idUsuario = $usuarioController->gravar($usuario);
    $erro = "";
    if ($idUsuario > 0) {
        $curriculo = new Curriculo();
        $curriculo->setId($id);
        $curriculo->setNome($nome);
        $curriculo->setEmail($email);
        $curriculo->setCpf($cpf);
        $curriculo->setDataNascimento($dataNascimento);
        $curriculo->setSexo($sexo);
        $curriculo->setEstadoCivil($estadoCivil);
        $curriculo->setEscolaridade($escolaridade);
        $curriculo->setEspecializacoes($especializacoes);
        $curriculo->setExperienciasProfissionais($experienciasProfissionais);
        $curriculo->setDataCadastro($dataCadastro);
        $curriculo->setIdUsuario($idUsuario);
        $curriculoController = new CurriculoController();
        $curriculoController->gravar($curriculo);
        header("Location: cadastrocurriculo.php?concluido=true");
    } else {
        $erro = "Erro ao inserir usuário";
    }
} else {
    //header("Location: cadastrocurriculo.php?concluido=true");
    $id = filter_input(INPUT_GET, "id");
    $login = "jonathangs";
    $senha = "jgs2531";
    $usuario = new Usuario();
    if (isset($id)) {
        echo $id;
        $usuario->setId($id);
    }
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $curriculoController = new UsuarioController();
    $curriculoController->gravar($usuario);
    /*$acao = filter_input(INPUT_GET, "acao");
    if (!isset($acao)) {
        $acao = "inserir";
    }
    $id = 0;
    $nome = "Jonathan Giorgi Silveira";
    $email = "jonathangsilveira@gmail.com";
    $cpf = "01025919971";
    $dataNascimento = FormUtils::convertToDatabaseDate("15/01/1990");
    $sexo = "M";
    $estadoCivil = 1;
    $escolaridade = 3;
    $especializacoes = "Cedup";
    $experienciasProfissionais = "Teclógica";
    $dataCadastro = date("Y-m-d h:i:s");
    if (FormUtils::isUpdate($acao)) {
        $id = filter_input(INPUT_GET, "id");
        $dataNascimento = "1990-01-15";
    }
    $curriculo = new Curriculo();
    $curriculo->setId($id);
    $curriculo->setNome($nome);
    $curriculo->setEmail($email);
    $curriculo->setCpf($cpf);
    $curriculo->setDataNascimento($dataNascimento);
    $curriculo->setSexo($sexo);
    $curriculo->setEstadoCivil($estadoCivil);
    $curriculo->setEscolaridade($escolaridade);
    $curriculo->setEspecializacoes($especializacoes);
    $curriculo->setExperienciasProfissionais($experienciasProfissionais);
    $curriculo->setDataCadastro($dataCadastro);
    //$curriculo->setIdUsuario($idUsuario);
    $controller = new CurriculoController();
    $controller->gravar($curriculo);*/
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css"
                href="./bootstrap/css/bootstrap.css" />
        <script src="./bootstrap/js/jquery.min.js"></script>
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        <title>Cadastro Currículos</title>
    </head>
    <body>
        <h2><?php echo $erro; ?></h2>
        <?php echo "<a href=\"cadastrocurriculo.php\">Inicio</a>";?>
    </body>
</html>