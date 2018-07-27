<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->
<?php 
require_once "utils/FormUtils.php";
require_once "entidade/Entidade.php";
require_once "entidade/Curriculo.php";
require_once "controle/Controller.php";
require_once "controle/CurriculoController.php";

$acao = filter_input(INPUT_GET, "acao");
if (FormUtils::isInsert($acao)) {
    $idUsuario = 0;
    $login = "";
    $senha = "";
    $email = "";
    $curriculo = new Curriculo();
    $curriculo->setId(0);
    $curriculo->setNome("");
    $curriculo->setEmail("");
    $curriculo->setCpf("");
    $curriculo->setDataNascimento("");
    $curriculo->setSexo("");
    $curriculo->setEstadoCivil(0);
    $curriculo->setEscolaridade(0);
    $curriculo->setEspecializacoes("");
    $curriculo->setExperienciasProfissionais("");
} else {
    $idUsuario = filter_input(INPUT_SESSION, "idUsuario");
    $login = filter_input(INPUT_SESSION, "login");
    $senha = filter_input(INPUT_SESSION, "senha");
    $email = filter_input(INPUT_SESSION, "email");
    $controller = new CurriculoController();
    $curriculo = $controller->buscarPeloUsuario($idUsuario);
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
        <!-- Título da tela -->
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-4 col-md-4">&nbsp;</div>
            <div class="col-sm-4 col-md-4">
                <h3>Currículo</h3>
            </div>
            <div class="col-sm-4 col-md-4">&nbsp;</div>
        </div>

        <!-- Espaçamento -->
        <div class="col-sm-12 col-md-12">&nbsp;</div>

        <!-- Formulário -->
        <div class="container">
            <form action="gravarcurriculo.php" method="POST">
                <input type="hidden" id="acao" name="acao" 
                       value="<?php echo $acao; ?>" />
                <input type="hidden" id="id" name="id" 
                       value="<?php echo $curriculo->getId(); ?>" />
                <h3>Dados de Acesso</h3>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" 
                               placeholder="Ex.: nome@companhia.com" 
                               name="email" 
                               value="<?php echo $email; ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="login" class="col-sm-2 control-label">Login:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" 
                               placeholder="Login" name="login" 
                               value="<?php echo $login; ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha" 
                               placeholder="Senha" name="senha" 
                               value="<?php echo $senha ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <h3>Dados Pessoais</h3>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" 
                               placeholder="Nome completo" name="nome" 
                               value="<?php echo $curriculo->getNome(); ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="cpf" class="col-sm-2 control-label">CPF:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cpf" 
                               placeholder="Somente números" name="cpf" 
                               value="<?php echo $curriculo->getCpf(); ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="dataNascimento" class="col-sm-2 control-label">
                        Data nascimento:
                    </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dataNascimento" 
                               placeholder="DD/MM/YYYY" name="dataNascimento" 
                               value="<?php echo $curriculo->getDataNascimento(); ?>">
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="sexo" class="col-sm-2 control-label">
                        Sexo:
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sexo" name="sexo"> 
                            <option value="" <?php echo empty($curriculo->getSexo()) ? "selected" : ""; ?>></option>
                            <option value="M" <?php echo $curriculo->getSexo() == "M" ? "selected" : ""; ?>>Masculino</option>
                            <option value="F" <?php echo $curriculo->getSexo() == "F" ? "selected" : ""; ?>>Feminino</option>
                        </select>
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="estadoCivil" class="col-sm-2 control-label">
                        Estado Civil:
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="estadoCivil" 
                                name="estadoCivil">
                            <option value="0"></option>
                            <option value="1">Solteiro(a)</option>
                            <option value="2">Casado(a)</option>
                            <option value="3">Divorciado(a)</option>
                            <option value="4">Viúvo(a)</option>
                            <option value="5">Separado(a)</option>
                        </select>
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="escolaridade" class="col-sm-2 control-label">
                        Escolaridade:
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="escolaridade" 
                                name="escolaridade">
                            <option value="0"></option>
                            <option value="1">Fundamental</option>
                            <option value="2">Médio</option>
                            <option value="3">Superior (Graduação)</option>
                            <option value="4">Pós-graduação</option>
                        </select>
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="especializacoes" class="col-sm-2 control-label">
                        Cursos/ Especializações:
                    </label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="especializacoes" 
                                  placeholder="Cursor profissionalizantes, técnicos, certificações" 
                                  name="especializacoes" rows="5"></textarea>
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <div class="form-group">
                    <label for="experienciasProfissionais" 
                           class="col-sm-2 control-label">
                        Experiência Profissional:
                    </label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" 
                                  id="experienciasProfissionais" 
                                  placeholder="Ultimo emprego" 
                                  name="experienciasProfissionais" rows="5"></textarea>
                    </div>
                </div>
                <!-- Espaçamento -->
                <div class="col-sm-12 col-md-12">&nbsp;</div>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-open"></span> Gravar
                </button>
            </form>
        </div>

    </body>
</html>
