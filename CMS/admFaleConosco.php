<?php
    require_once('conexao.php');
    $conexao = conexaoBD();

    $sql = "SELECT * FROM tbl_form_fale_conosco";
    $select = mysqli_query($conexao, $sql);

    if(isset($_GET['modo'])){
        
        if($_GET['modo'] == 'excluir'){
            $id = $_GET['id'];
            
            $sql = "delete from tbl_form_fale_conosco where id=".$id;
            mysqli_query($conexao, $sql);
            header('location:admFaleConosco.php');
            
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CMS Fale Conosco</title>
        <link rel="stylesheet"
              type="text/css"
              href="css/style.css">
        
        <script src="js/jquery.js"></script>
        
        <script>
            $(document).ready(function(){
                $(".visualizar").click(function(){
                    $("#container").fadeIn(100);
                });
            });
            
            function modal(idItem){ /*FUNÇÃO PARA RECEBER O ID DO REGISTRO E DESCARREGAR NA MODAL*/
                $.ajax({ /*SOMENTE O AJAX CONSEGUE FORÇAR O POST/GET PARA UMA PAGINA, SEM PRECISAR ATUALIZAR A PAGINA*/
                    
                    type: "GET",
                    url: "modal.php",
                    data: {idRegistro:idItem},
                   success: function(dados){
                        
                     $('#modal').html(dados);
                    }
                })
            }
            
        </script>
        
        
    </head>
    <body>
        
        <!-- CÓDIGO PARA GERAR A TELA DA MODAL NO NAVEGADOR -->
        <div id="container">
            <div id="modal">
        
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
                <div id="tituloFaleConosco">
                    CONSULTA DE DADOS
                </div>
                
                <div  id="tabelaFaleConosco">
                   <div id=areaTitulos>
                        <div id="tituloNome">
                            Nome
                        </div>
                       
                        <div id="tituloCelular">
                            Celular
                        </div>
                       
                        <div id="tituloEmail">
                            Email
                        </div>
                       
                       <div id="tituloOpcoes">
                            Opções
                        </div>
                    </div> 
                    
                    <div id="guardaResultadosFaleConosco">
                        
                        <?php
                            while($resultContatos=mysqli_fetch_array($select)){
                        ?>
                        
                        <div id="linhaResultados">
                            <div id="resultadoNome">
                                <?php echo($resultContatos['nome']) ?>
                            </div>

                            <div id="resultadoCelular">
                                <?php echo($resultContatos['celular']) ?>
                            </div>

                            <div id="resultadoEmail">
                                <?php echo($resultContatos['email']) ?>
                            </div>

                            <div id="resultadoOpcoes">
                                <a href="admFaleConosco.php?modo=excluir&id=<?php echo($resultContatos['id'])?>" >
                                    <img src="imagens/delete.png" name="delete" class="imgOpcoes">
                                </a>
                                
                                <a href="#" class="visualizar" onclick="modal(<?php echo($resultContatos['id'])?>)">
                                    <img src="imagens/visualizar.png" class="imgOpcoes">
                                </a>
                            </div>
                        </div>
                        
                        <?php
                            }
                        ?>
                    </div>
                </div>
                
            </div>
            
            <footer> <!-- RODAPÉ -->
                    Copyright 2018 - Todos os direitos reservados / Desenvolvido por: Vitoria Gonçalves
            </footer>
        </div>
    </body> 
</html>