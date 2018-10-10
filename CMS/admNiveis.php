<?php
    require_once('conexao.php');
    $conexao = conexaoBD();

    $sql = "SELECT * FROM tbl_nivel_usuario";

    $select = mysqli_query($conexao, $sql);

    /*PASSANDO INFORMAÇÕES PARA A BIBLIOTECA DO MYSQL, ESTABELECE A CONEXÃO COM O BANCO DE DADOS MSQL, USANDO A BIBLIOTECA MYSQLI*/

    if(isset($_GET['btnSalvar'])){

        /*RESGATA VALOR DOS CAMPOS*/
        $nomeNivel = $_GET['txtNomeNivel'];
            
            
        $sql = "INSERT INTO tbl_nivel_usuario
                    (nome_nivel)

                VALUES('".$nomeNivel."')";
            
        mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
        header('location:admNiveis.php');
        
    }

    if(isset($_GET['modo'])){
        
        if($_GET['modo'] == 'excluir'){
            $id_nivel = $_GET['id_nivel'];
            
            $sql = "delete from tbl_nivel_usuario where id_nivel=".$id_nivel;
            mysqli_query($conexao, $sql);
            header('location:admNiveis.php');
            
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
                            while($resultContatos=mysqli_fetch_array($select)){
                        ?>
                        
                        <div id="linhaResultados2"> <!-- LINHA1 -->
                            <div id="resultadoNome">
                                <?php echo($resultContatos['nome_nivel']) ?>
                            </div>

                            <div id="resultadoOpcoes">
                                <a href="admNiveis.php?modo=excluir&id_nivel=<?php echo($resultContatos['id_nivel'])?>" >
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                </a>

                                <img src="imagens/toedit.png" class="imgOpcoes2">

                                <img src="imagens/ativado.png" class="imgOpcoes2">
                                
                                <img src="imagens/desativado.png" class="imgOpcoes2">

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
                                    <br><input type="text" name="txtNomeNivel" placeholder="Digite o nome do nível" class="inputText1">
                                </div>


                                <div class="guardaBotao">
                                    <input type="submit" name="btnSalvar" value="SALVAR" class="botao"> 
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
    </body> 
</html>