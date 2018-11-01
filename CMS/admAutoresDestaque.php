<?php
    require_once('conexao.php');
    $conexao = conexaoBD();
    
    $botao = "SALVAR";
    $nomeAutor = "";
    $biografiaAutor = "";
    $fotoAutor = "";

    session_start();

    if(isset($_POST['btnSalvar'])){
        
        /*RESGATA VALOR DOS CAMPOS*/
        $nomeAutor = $_POST['txtNome'];
        $biografiaAutor = $_POST['txtBiografia'];
        $arquivo = $_FILES['fleFoto']['name'];
        $tamanho_arquivo = $_FILES['fleFoto']['size'];
        $tamanho_arquivo = round($tamanho_arquivo / 1024);
        $ext_arquivo = strrchr($arquivo,  ".");
        $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
        $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
        $diretorio_arquivo ="arquivos/";
        $arquivos_permitidos = array(".jpg", ".png", ".jpeg");
            
        
        $sql ="INSERT INTO tbl_autor (nome_autor, foto_autor, biografia_autor)
                VALUES('".$nomeAutor."','".$foto."','".$biografiaAutor."')";
        
        
        /*else if($_POST['btnSalvar']=="EDITAR"){
            
        }*/
        
        mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
        //header('location:admAutoresDestaque.php');
        
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
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
        
        <script>
            $(document).ready(function(){
                $('foto'.live('change', function(){
                    $('#visualizar').html("<img src='imagens/carregando.gif'>");
                    setTimeout(function(){
                    $('frmFoto').ajaxForm({
                        target:'#visualizar'
                    }).submit();
                    }, 2000);
                });
                  
                /*COLOCANDO git ANIMADO NO CLIQUE DO BOTÃO SALVAR*/
                $('#btnSalvar').click(function(){
                    $('visualizar').html("<img src='imagens/ajax-salvando.gif'>");
                    
                    setTimeOut(function(){
                        frmCadastro.submit();
                    },2000);
                });
                   
            });
        </script>
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
                        
                        <?php
                            $sql = "select * from tbl_autor order by id_autor desc";
                            $select = mysqli_query($conexao, $sql);
                        
                            while($rsAutores=mysqli_fetch_array($select)){
                        ?>
                        
                        <div id="linhaResultados" > <!-- LINHA1 -->
                            
                            <div id="resultadoImagemAutor">
                                <img src="<?php echo($rsAutores['foto_autor'])?>" width="50px" height="50px">
                    
                            </div>

                            <div id="resultadoNomeAutor">
                                <?php echo($rsAutores['nome_autor'])?>
                            </div>

                            <div id="resultadoBiografia">
                                <?php echo($rsAutores['biografia_autor'])?>
                            </div>

                            <div id="resultadoOpcoesAutores">
                                
                                    <img src="imagens/delete.png" class="imgOpcoes2">
                                

                                
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
                    <div id="tituloAutores">
                        CADASTRO DE AUTORES EM DESTAQUE
                    </div>
                    
                    <div id="formCadastro"><!-- FORMULARIO DE CADASTRO -->
                        
                        <form name="frmAutores" method="post" action="admAutoresDestaque.php" enctype="multipart/form-data">
                        
                            <div class="linhaAutores"> <!-- PRIMEIRA LINHA -->
                                <div class="guardaInput1">
                                    <label>Nome do Autor:</label>
                                    <br><input type="text" name="txtNome" value="<?php echo($nomeAutor)?>" placeholder="Digite o nome do autor" class="inputText1" maxlength="100" onkeypress="return validar(event, 'num', this.id);" required>
                                </div>

                                
                            </div>
                            
                            
                            <div class="linhaAutores2"> <!-- 2º LINHA -->

                                

                                <div class="guardaBotao2">
                                    <input type="submit" name="btnSalvar" value="<?php echo($botao)?>" class="botao" > 
                                </div>

                            </div>
                            
                            <div class="linhaAutores3">
                                <div class="guardaInput1">
                                    <label>Biografia:</label>
                                    <br><textarea rows="9" cols="62" name="txtBiografia" value="<?php echo($biografiaAutor)?>" style="resize: none" name="txtBiografia">
                                        
                                        </textarea>
                                </div>
                            </div>
                        
                        
                        
                        </form>
                        
                        <div class="guardaInput5">
                            <label>Imagem do Autor:</label>
                            <br><input type="text" value="<?php echo($fotoAutor)?>" name="txtLogin" class="inputText4" id="visualizar">
                                    
                            <form id="frmFoto" name="uploadImagens" action="uploadAutores" method="post" enctype="multipart/form-data">
                                
                            <p>Foto:<input type="file" value="Escolher arquivo" name="fleFoto" id="foto">
                                
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