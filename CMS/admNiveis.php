<?php
    require_once('conexao.php');
    $conexao = conexaoBD();

    $desabilitado = "";


    /*DECLARAÇÃO DAS VARIAVEIS NO EDITAR, PARA CORREÇÃO DE ERRO*/
    $nomeNivel = null;
    
    $botao = "SALVAR";

    session_start();

    /*PASSANDO INFORMAÇÕES PARA A BIBLIOTECA DO MYSQL, ESTABELECE A CONEXÃO COM O BANCO DE DADOS MSQL, USANDO A BIBLIOTECA MYSQLI*/

    if(isset($_GET['btnSalvar'])){
        
        /*RESGATA VALOR DOS CAMPOS*/
        $nomeNivel = $_GET['txtNomeNivel'];
            
        if($_GET['btnSalvar']=="SALVAR"){
            $sql = "INSERT INTO tbl_nivel_usuario
                        (nome_nivel)

                    VALUES('".$nomeNivel."')";
        }
        
        else if($_GET['btnSalvar']=="EDITAR"){
            $sql = "UPDATE tbl_nivel_usuario SET
                                                nome_nivel = '".$nomeNivel."'
                                                
                                                WHERE id_nivel=".$_SESSION['id_nivel'];
        
        }
        
        mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
        header('location:admNiveis.php');
    }

    /*VERIFICA A EXISTÊNCIA DA VARIAVEL MODO NA URL*/
    /*A VARIAVEL MODO É ENVIADA PARA A URL ATRAVES DO LINK NA TABELA DA CONSULTA, ASSIM COMO O ID DO REGISTRO QUE SERÁ EXCLUIDO OU EDITADO*/
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == 'excluir'){/*SE MODO FOR EXCLUIR FAZ O DELETE*/
            
            $id_nivel = $_GET['id_nivel'];
            $sql = "delete from tbl_nivel_usuario where id_nivel=".$id_nivel;
            mysqli_query($conexao, $sql);
            header('location:admNiveis.php');
        }
        
        else if($modo == 'editar'){
            $botao = "EDITAR";
            $id_nivel = $_GET['id_nivel'];
            $_SESSION['id_nivel'] = $id_nivel;
            $sql= "select * from tbl_nivel_usuario where id_nivel=".$id_nivel;
            
            $select = mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
            
            if($rsConsulta=mysqli_fetch_array($select)){
                $nomeNivel = $rsConsulta['nome_nivel'];
            }
        }
        
        
        else if($modo == 'ativar'){
            $id_nivel = $_GET['id_nivel'];
            
            $sql = "update tbl_nivel_usuario set status_nivel = '1' where id_nivel=".$id_nivel;
            
            mysqli_query($conexao, $sql);
            
        }
        
        else if($modo == 'desativar'){
            $id_nivel = $_GET['id_nivel'];
            
            $sql = "update tbl_nivel_usuario set status_nivel = '0' where id_nivel=".$id_nivel;
            
            mysqli_query($conexao, $sql);

        }
        
        else if($modo == 'visualizar'){
            $id_nivel = $_GET['id_nivel'];
            $_SESSION['id_nivel'] = $id_nivel;
            $sql= "select * from tbl_nivel_usuario where id_nivel=".$id_nivel;
            
            $select = mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
            
            if($rsConsulta=mysqli_fetch_array($select)){
                $nomeNivel = $rsConsulta['nome_nivel'];
            }
            
            $desabilitado = "disabled";

        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CMS Cadastro Niveis</title>
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
                <div  id="tabelaNiveis">
                    
                    
                    
                   <div id=areaTitulos2>
                        <div id="tituloNome2">
                            Nome do Nível
                        </div>
      
                       <div id="tituloOpcoes2">
                            Opções
                        </div>
                    </div> 
                    
                    
                    
                    <div id="guardaLinhasResultados">
                        
                        <?php
                            $sql = "SELECT * FROM tbl_nivel_usuario";

                            $select = mysqli_query($conexao, $sql);
                            while($resultNivel=mysqli_fetch_array($select)){
                                
                                $status_nivel = $resultNivel['status_nivel'];
                                
                                if($status_nivel == 0){
                                    $mudaCorStatus = "#ef9787";
                                }
                                
                                else{
                                    $mudaCorStatus = "#98ef88";
                                }
                                
                        ?>
                        
                        <div id="linhaResultados2" style="background-color:<?php echo($mudaCorStatus)?>"> <!-- LINHA1 -->
                            <div id="resultadoNome">
                                <?php echo($resultNivel['nome_nivel']) ?>
                            </div>

                            <div id="resultadoOpcoes">
                                <a href="admNiveis.php?modo=excluir&id_nivel=<?php echo($resultNivel['id_nivel'])?>" >
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                </a>
                                    
                                <a href="admNiveis.php?modo=editar&id_nivel=<?php echo($resultNivel['id_nivel'])?>">
                                    <img src="imagens/toedit.png" class="imgOpcoes2">
                                </a>
                                
                                <a href="admNiveis.php?modo=ativar&id_nivel=<?php echo($resultNivel['id_nivel'])?>">
                                    <img src="imagens/ativado.png" class="imgOpcoes2">
                                </a>
                                
                                <a href="admNiveis.php?modo=desativar&id_nivel=<?php echo($resultNivel['id_nivel'])?>">
                                    <img src="imagens/desativado.png" class="imgOpcoes2">
                                </a>
                                
                                <a href="admNiveis.php?modo=visualizar&id_nivel=<?php echo($resultNivel['id_nivel'])?>">
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
                        CADASTRO DE NÍVEL
                    </div>
                    
                    <div id="formCadastroNivel"><!-- FORMULARIO DE CADASTRO -->
                        <div class="linhaUsuarios"> <!-- PRIMEIRA LINHA -->
                            <form name="frmNiveisUsuario" method="get" action="admNiveis.php">
                                <div class="guardaInput1">
                                    <label>Nome:</label>
                                    <br><input type="text" name="txtNomeNivel" placeholder="Digite o nome do nível" value="<?php echo($nomeNivel)?>" class="inputText1" maxlength="100" onkeypress="return validar(event, 'num', this.id);" <?php echo($desabilitado)?>>
                                </div>


                                <div class="guardaBotao">
                                    <input type="submit" name="btnSalvar" value="<?php echo($botao) ?>" class="botao"> 
                                </div>
                            </form>
                        </div>
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