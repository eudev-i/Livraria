<?php
    require_once('conexao.php');
    $conexao = conexaoBD();
    
    $botao = "SALVAR";
    
    session_start();

    if(isset($_GET['btnSalvar'])){
        
        /*RESGATA VALOR DOS CAMPOS*/
        $nomeAutor = $_GET['nome_autor'];
        $fotoAutor = $_GET['foto_autor'];
        $biografiaAutor = $_GET['biografia_autor'];
            
        
            
        if($_GET['btnSalvar']=="SALVAR"){
            $sql = "INSERT INTO tbl_autor
                    (nome_autor,foto_autor,biografia_autor)
                    VALUES('".$nomeAutor."','".$fotoAutor."','".$biografiaAutor."')";
        }
        
        /*else if($_GET['btnSalvar']=="EDITAR"){
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
        //header('location:admUsuarios.php');
    }

    /*if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == 'excluir'){/*SE MODO FOR EXCLUIR FAZ O DELETE*/
            
            /*$id_usuario = $_GET['id_usuario'];
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
            
            /*if($rsConsulta=mysqli_fetch_array($select)){
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

        }
        
        else if($modo == 'desativar'){
            $id_usuario = $_GET['id_usuario'];
            
            $sql = "update tbl_usuario set status = '0' where id_usuario=".$id_usuario;
            
            mysqli_query($conexao, $sql);
            
        }
        
        
    }*/
    

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CMS Cadastro Usuarios</title>
        <link rel="stylesheet"
              type="text/css"
              href="css/style.css">
        
        
    </head>
    <body>
        
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
                <div  id="tabelaAutores">
                   <div id=areaTitulos>
                        <div id="tituloImagemAutor">
                            Imagem do Autor
                        </div>
                       
                        <div id="tituloNomeAutor">
                            Nome do Autor
                        </div>
                       
                        <div id="tituloBiografia">
                            Biografia
                        </div>
                       
                       <div id="tituloOpcoes">
                            Opções
                        </div>
                    </div> 
                    
                    <div id="guardaLinhasResultadosAutores">
                        
                        
                        
                        <div id="linhaResultados" > <!-- LINHA1 -->
                            
                            <div id="resultadoImagemAutor">
                                
                            </div>

                            <div id="resultadoNomeAutor">
                                
                            </div>

                            <div id="resultadoBiografia">
                                
                            </div>

                            <div id="resultadoOpcoes">
                                
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                

                                
                                    <img src="imagens/toedit.png" class="imgOpcoes2">
                                
                                
                                
                                    <img src="imagens/ativado.png" class="imgOpcoes2">
                               
                                
                                
                                    <img src="imagens/desativado.png" class="imgOpcoes2">
                                
                                
                            </div>
                            
                        </div>
                        
                        <div id="linhaResultados" style="background-color:<?php echo($mudaCorStatus)?>"> <!-- LINHA1 -->
                            
                            <div id="resultadoImagemAutor">
                                
                            </div>

                            <div id="resultadoNomeAutor">
                                
                            </div>

                            <div id="resultadoBiografia">
                                
                            </div>

                            <div id="resultadoOpcoes">
                                
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                

                                
                                    <img src="imagens/toedit.png" class="imgOpcoes2">
                                
                                
                                
                                    <img src="imagens/ativado.png" class="imgOpcoes2">
                               
                                
                                
                                    <img src="imagens/desativado.png" class="imgOpcoes2">
                                
                                
                            </div>
                            
                        </div>


                        
                    </div>
                </div>
                
                <div id="areaFormUsuarios"> <!-- AREA DO FORMULARIO DE CADASTRO -->
                    <div id="tituloAutores">
                        CADASTRO DE AUTORES EM DESTAQUE
                    </div>
                    
                    <div id="formCadastro"><!-- FORMULARIO DE CADASTRO -->
                        
                        <form name="frmAutores" method="get" action="admAutoresDestaque.php">
                        
                            <div class="linhaAutores"> <!-- PRIMEIRA LINHA -->
                                <div class="guardaInput1">
                                    <label>Nome do Autor:</label>
                                    <br><input type="text" name="txtNome" value="<?php echo($nomeAutor)?>" placeholder="Digite o nome do autor" class="inputText1" maxlength="100" onkeypress="return validar(event, 'num', this.id);" required>
                                </div>

                                
                            </div>
                            
                            
                            <div class="linhaAutores2"> <!-- 2º LINHA -->

                                <div class="guardaInput1">
                                    <label>Imagem do Autor:</label>
                                    <br><input type="text" value="<?php echo($fotoAutor)?>" name="txtLogin" class="inputText4" >
                                    <p>Foto:<input type="file" value="Escolher arquivo" name="fleFoto" id="foto">
                                </div>

                                <div class="guardaBotao2">
                                    <input type="submit" name="btnSalvar" value="<?php echo($botao)?>" class="botao" > 
                                </div>

                            </div>
                            
                            <div class="linhaAutores3">
                                <div class="guardaInput1">
                                    <label>Biografia:</label>
                                    <br><textarea rows="9" cols="62" name="txtBiografia" value="<?php echo($biografiaAutor)?>">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
                                        </textarea>
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
        <script src="js/javaScript/script.js"></script>
    </body> 
</html>