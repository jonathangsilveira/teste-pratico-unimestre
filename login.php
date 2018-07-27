<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css" />
        <title>Gestão currículos</title>
    </head>
    <body>

        <div class="col-sm-12 col-md-12">&nbsp;</div>
        <div class="col-sm-12 col-md-12">&nbsp;</div>
        <div class="col-sm-12 col-md-12">&nbsp;</div>

        <div class="col-sm-12 col-md-12">
            <div class="col-sm-4 col-md-4">
                &nbsp;
            </div>
            <div class="col-sm-4 col-md-4">
                <form action="./validarlogin.php" method="post">
                    <label>Usuário </label>
                    <input class="form-control" type="text" name="login" placeholder="login" />

                    <br />

                    <label>Senha </label>
                    <input class="form-control" type="password" name="senha" placeholder="senha" />

                    <br />

                    <input class="btn btn-primary" type="submit" name="entrar" value="Entrar" />
                    <a href="./cadastrocurriculo.php?acao=inserir">Não possui cadastro?</a>
                </form>
            </div>
            <div class="col-sm-4 col-md-4">
                &nbsp;
            </div>
        </div>

    </body>
</html>