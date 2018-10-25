<?php
    require_once('conexao.php');
    $conexao = conexaoBD();

    /*DECLARAÇÃO DAS VARIAVEIS NO EDITAR, PARA CORREÇÃO DE ERRO*/
    $nomeUsuario = null;
    $celularUsuario = null;
    $telefoneUsuario = null;
    $nivelUsuario = null;
    $sexoUsuario = null;
    $loginUsuario = null;
    $senhaUsuario = null;

    $botao = "SALVAR";

    session_start();


    if(isset($_GET['btnSalvar'])){
        
        /*RESGATA VALOR DOS CAMPOS*/
        $nomeUsuario = $_GET['txtNome'];
        $celularUsuario = $_GET['txtCelular'];
        $telefoneUsuario = $_GET['txtTelefone'];
        $nivelUsuario = $_GET['sltNivel'];
        $sexoUsuario = $_GET['sltSexo'];
        $loginUsuario = $_GET['txtLogin'];
        $senhaUsuario = $_GET['txtSenha'];
            
        
            
        if($_GET['btnSalvar']=="SALVAR"){
            $sql = "INSERT INTO tbl_usuario
                    (nome_usuario,celular_usuario,telefone_usuario,sexo_usuario,login_usuario,senha_usuario,id_nivel)

                    VALUES('".$nomeUsuario."','".$celularUsuario."','".$telefoneUsuario."','".$sexoUsuario."','".$loginUsuario."','".$senhaUsuario."','".$nivelUsuario."')";
        }
        
        else if($_GET['btnSalvar']=="EDITAR"){
            $sql = "UPDATE tbl_usuario SET
                                            nome_usuario = '".$nomeUsuario."',
                                            celular_usuario = '".$celularUsuario."',
                                            telefone_usuario = '".$telefoneUsuario."',
                                            sexo_usuario = '".$sexoUsuario."',
                                            login_usuario = '".$loginUsuario."',
                                            senha_usuario = '".$senhaUsuario."',
                                            id_nivel = '".$nivelUsuario."'
                                            
                                                
                                            WHERE id_usuario=".$_SESSION['id_usuario'];
        
        }
        
        mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
       // header('location:admUsuarios.php');
        echo($sql);
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == 'excluir'){/*SE MODO FOR EXCLUIR FAZ O DELETE*/
            
            $id_usuario = $_GET['id_usuario'];
            $sql = "delete from tbl_usuario where id_usuario=".$id_usuario;
            mysqli_query($conexao, $sql);
            header('location:admUsuarios.php');
        }
        
        else if($modo == 'editar'){
            $botao = "EDITAR";
            $id_usuario = $_GET['id_usuario'];
            $_SESSION['id_usuario'] = $id_usuario;
            $sql= "select tbl_usuario.*, tbl_nivel_usuario.nome_nivel
                    from tbl_usuario, tbl_nivel_usuario
                    where tbl_usuario.id_nivel = tbl_nivel_usuario.id_nivel and tbl_usuario.id_usuario=".$id_usuario;
            
            $select = mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
            
            if($rsConsulta=mysqli_fetch_array($select)){
                $nomeUsuario = $rsConsulta['nome_usuario'];
                $celularUsuario = $rsConsulta['celular_usuario'];
                $telefoneUsuario = $rsConsulta['telefone_usuario'];
                $nivelUsuario = $rsConsulta['id_nivel'];
                $nomeNivelUsuario = $rsConsulta['nome_nivel'];
                $sexoUsuario = $rsConsulta['sexo_usuario'];
                $loginUsuario = $rsConsulta['login_usuario'];
                $senhaUsuario = $rsConsulta['senha_usuario'];    
                
            }
            
        }
        
        else if($modo == 'ativar'){
            $id_usuario = $_GET['id_usuario'];
            
            $sql = "update tbl_usuario set status = '1' where id_usuario=".$id_usuario;
            
            mysqli_query($conexao, $sql);

            echo($sql);
        }
        
        else if($modo == 'desativar'){
            $id_usuario = $_GET['id_usuario'];
            
            $sql = "update tbl_usuario set status = '0' where id_usuario=".$id_usuario;
            
            mysqli_query($conexao, $sql);
            
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CMS Cadastro Usuarios</title>
        <link rel="stylesheet"
              type="text/css"
              href="css/style.css">
        
        <script src="js/jquery.js"></script>
        
        <script>
            $(document).ready(function(){
               $(".v").click(function(){
                   
                   $(".containerUsuario").fadeIn(100); 
               });
            });
            
            function modalUsuario(idItem){
                alert("pkl");
                $.ajax({
                    type: "GET",
                    url: "modalUsuario.php",
                    data:{idItem:idItem},
                    success: function(dados){
                        
                        $('#modalUsuario').html(dados);
                    }
                })
            }
        </script>
    </head>
    <body>
        <!-- CÓDIGO PARA GERAR A TELA DA MODAL NO NAVEGADOR -->
        <div class="containerUsuario">
            <div id="modalUsuario">
        
            </div>
        </div>
        <!-- *********************************************** -->
        
        <div id="principal">
            <header> <!-- CABECALHO -->
                <div id="textoCabecalho">
                    CMS - Sistema de Gerenciamento do Site
                </div>
                
                <div id="areaLogo"> <!-- LOGO -->
                    <img src="imagens/logo.png" id="imgLogo" alt="logo" title="logo">
                </div>
            </header>
            
            <div id="areaMenu"> <!-- AREA QUE FICARÁ MENU E NOME DE QUEM ESTÁ LOGADO -->
                <nav> <!-- MENU -->
                    <a href="admConteudo.html">
                        <div class="menuItem">
                            <img src="imagens/config.png" class="imgConfig" alt="icone Administracao de Conteudo" title="icone Administracao de Conteudo">
                            Adm. Conteúdo
                        </div>
                    </a>
                    
                    <a href="admFaleConosco.php">
                        <div class="menuItem">
                            <img src="imagens/faleConosco.png" class="imgConfig" alt="icone Administracao do Fale Conosco" title="icone Administracao do Fale Conosco">
                            Adm. Fale Conosco
                        </div>
                    </a>
                    
                    <a href="admProdutos.html">
                        <div class="menuItem">
                            <img src="imagens/book.png" class="imgConfig" alt="icone Administracao de Produtos" title="icone Administracao de Produtos">
                            Adm. Produtos
                        </div>
                    </a>
                    
                    <a href="admEscolhaNiveisUsuarios.html">
                        <div class="menuItem">
                            <img src="imagens/user1.png" class="imgConfig" alt="icone Administracao de Usuarios" title="icone Administracao de usuarios">
                            Adm. Usuários
                        </div>
                    </a>
                </nav>
                
                <div id="nomeUsuario">
                    Bem vindo, [xxxxx xxx].
                </div>
                <div id="areaSair">
                    Logout
                </div>
            </div>
            
            <div id="conteudoAdmConteudo"> <!-- CONTEUDO -->
                <div  id="tabelaUsuarios">
                   <div id=areaTitulos>
                        <div id="tituloNome">
                            Nome
                        </div>
                       
                        <div id="tituloCelular">
                            Celular
                        </div>
                       
                        <div id="tituloEmail">
                            Nome de Usuário
                        </div>
                       
                       <div id="tituloOpcoes">
                            Opções
                        </div>
                    </div> 
                    
                    <div id="guardaLinhasResultados">
                        
                        <?php
                            $sql = "SELECT * FROM tbl_usuario";

                            $select = mysqli_query($conexao, $sql);
                            while($resultUsuario=mysqli_fetch_array($select)){
                        ?>
                        
                        <div id="linhaResultados"> <!-- LINHA1 -->
                            
                            <div id="resultadoNome">
                                <?php echo($resultUsuario['nome_usuario']) ?>
                            </div>

                            <div id="resultadoCelular">
                                <?php echo($resultUsuario['celular_usuario']) ?>
                            </div>

                            <div id="resultadoEmail">
                                <?php echo($resultUsuario['login_usuario']) ?>
                            </div>

                            <div id="resultadoOpcoes">
                                <a  href="admUsuarios.php?modo=excluir&id_usuario=<?php echo($resultUsuario['id_usuario'])?>">
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                </a>

                                <a  href="admUsuarios.php?modo=editar&id_usuario=<?php echo($resultUsuario['id_usuario'])?>">
                                    <img src="imagens/toedit.png" class="imgOpcoes2">
                                </a>
                                
                                <a  href="admUsuarios.php?modo=ativar&id_usuario=<?php echo($resultUsuario['id_usuario'])?>">
                                    <img src="imagens/ativado.png" class="imgOpcoes2">
                                </a>
                                
                                <a  href="admUsuarios.php?modo=desativar&id_usuario=<?php echo($resultUsuario['id_usuario'])?>">
                                    <img src="imagens/desativado.png" class="imgOpcoes2">
                                </a>
                                
                                <a  href="#" class="v" onclick="modalUsuario(<?php echo($resultUsuario['id_usuario'])?>)">
                                    <img src="imagens/visualizar.png" class="imgOpcoes2">
                                </a>
                            </div>
                            
                        </div>

                        <?php
                            }
                        ?>
                    </div>
                </div>
                
                <div id="areaFormUsuarios"> <!-- AREA DO FORMULARIO DE CADASTRO -->
                    <div id="tituloFaleConosco">
                        CADASTRO DE USUÁRIO
                    </div>
                    
                    <div id="formCadastro"><!-- FORMULARIO DE CADASTRO -->
                        
                        <form name="frmUsuarios" method="get" action="admUsuarios.php">
                        
                            <div class="linhaUsuarios"> <!-- PRIMEIRA LINHA -->
                                <div class="guardaInput1">
                                    <label>Nome:</label>
                                    <br><input type="text" name="txtNome" value="<?php echo($nomeUsuario)?>" placeholder="Digite seu nome completo" class="inputText1">
                                </div>

                                <div class="guardaInput2">
                                    <label>Celular:</label>
                                    <br><input type="text" name="txtCelular" value="<?php echo($nomeUsuario)?>" value="<?php echo($celularUsuario)?>" placeholder="(11)95426-3763" class="inputText2">
                                </div>

                                <div class="guardaInput2">
                                    <label>Telefone:</label>
                                    <br><input type="text" name="txtTelefone" value="<?php echo($telefoneUsuario)?>" placeholder="(11)2536-0000"class="inputText2">
                                </div>

                                <div class="guardaInput2">
                                    <label>Sexo:</label>
                                    <br>
                                    <select name="sltSexo">
                                      <option value="">Escolha uma opção</option>
                                      <option value="F">Feminino</option>
                                      <option value="M">Masculino</option>
                                      <option value="P">Prefiro não dizer</option>
                                    </select>
                                </div>
                            </div>
                        
                        
                        
                            <div class="linhaUsuarios"> <!-- 2º LINHA -->
                                <div class="guardaInput2">
                                    <label>Nível de Usuário:</label>
                                    <br>
                                    <select name="sltNivel">
                                        <?php
                                            if($modo != 'editar' ){
                                                
                                                $nivelUsuario = 0;

                                        ?>
                                        <option value="">Escolha uma opção</option>

                                        <?php
                                            }else{
                                        ?>
                                        <option value="<?php echo($nivelUsuario)?>"><?php echo($nomeNivelUsuario)?></option>
                                        
                                        <?php
                                            }
                                        ?>
                                
                                        <?php
                                            
                                        
                                            
                                            $sql= "SELECT * FROM tbl_nivel_usuario WHERE tbl_nivel_usuario.id_nivel <> ".$nivelUsuario." ORDER BY id_nivel DESC";

                                            $select = mysqli_query($conexao,$sql);
                                            while($resultCombo=mysqli_fetch_array($select)){
                                        ?>

                                        <option value="<?php echo($resultCombo['id_nivel'])?>"><?php echo($resultCombo['nome_nivel'])?></option>

                                        <?php
                                            }
                                        ?>

                                    </select>
                                </div>

                                <div class="guardaInput3">
                                    <label>Nome de Usuário:</label>
                                    <br><input type="text" value="<?php echo($loginUsuario)?>" name="txtLogin" class="inputText3">
                                </div>

                                <div class="guardaInput2">
                                    <label>Senha:</label>
                                    <br><input type="password" value="<?php echo($senhaUsuario)?>" name="txtSenha" class="inputText2">
                                </div>

                                <div class="guardaBotao">
                                    <input type="submit" name="btnSalvar" value="<?php echo($botao) ?>" class="botao"> 
                                </div>

                                <div class="guardaBotao">
                                    <input type="submit" name="btnSalvar" value="LIMPAR" class="botao"> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <footer> <!-- RODAPÉ -->
                Copyright 2018 - Todos os direitos reservados / Desenvolvido por: Vitoria Gonçalves
            </footer>
        </div>
    </body> 
</html>