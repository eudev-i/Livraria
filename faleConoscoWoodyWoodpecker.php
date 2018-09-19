<?php

        $host = "localhost";/*AONDE ESTÁ O BANCO DE DADOS (PODE SER COLOCADOS PO IP OU LOCAL) - localhost*/
        $database = "db_formulariofaleconosco";/*NOME NO MEU DATABASE - dbcontatos2018inf3m*/
        $user = "root";/*USUSARIO QUE ME EU ME LOGO NO BANDO - root*/
        $password = "bcd127"; /*SENHA DO BANCO - bcd127*/

        /*PASSANDO INFORMAÇÕES PARA A BIBLIOTECA DO MYSQL, ESTABELECE A CONEXÃO COM O BANCO DE DADOS MSQL, USANDO A BIBLIOTECA MYSQLI*/
        if(!$conexao = mysqli_connect($host,$user,$password,$database)){
            echo('Erro na conexao com Banco de Dados');
        }
            
        if(isset($_GET['btnEnviar'])){

            /*RESGATA VALOR DOS CAMPOS*/
            $nome = $_GET['txtNomeContatos'];
            $profissao = $_GET['txtProfissaoContatos'];
            $email = $_GET['txtEmailContatos'];
            $sexo = $_GET['rdoSexo'];
            $telefone = $_GET['txtTelefoneContatos'];
            $celular = $_GET['txtCelularContatos'];
            $homepage = $_GET['txtHomePageContatos'];
            $facebook = $_GET['txtLinkFacebookContatos'];
            $infProdutos = $_GET['textInfoProdutos'];
            $sugestoes = $_GET['textSugestoesCriticas'];
            
            
            $sql = "INSERT INTO tbl_form_fale_conosco
                    (nome,telefone,celular,email,homePage,pageFacebook,sexo,sugestoes,profissao,produto)

                    VALUES('".$nome."',
                    '".$telefone."',
                    '".$celular."',
                    '".$email."',
                    '".$homepage."',
                    '".$facebook."',
                    '".$sexo."',
                    '".$sugestoes."',
                    '".$profissao."',
                    '".$infProdutos."'
                    )";
            
            mysqli_query($conexao, $sql);/*EXECUTA NO BANCO DE DADOS O SCRIPT*/
            header('location:faleConoscoWoodyWoodpecker.php');
           
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Fale Conosco Woody Woodpecker</title>
        <link rel="stylesheet"
              type="text/css"
              href="css/style.css">
        
        
    </head>
    <body>
        <div id="cabecalho100"> <!-- CABECALHO 100% -->
            <header> <!-- CABECALHO CENTRALIZADO -->
                    <img src="imagens/logo.png" id="imgLogo" alt="logo" title="logo"> <!-- IMAGEM LOGO -->

                    <nav id="menu1"> <!-- MENU PARA NAVEGAÇÃO NO SITE -->
                        <a href="promocoesWoodyWoodpecker.html" title="Promocoes">
                            <div class="menu1Item">
                                Promoções
                            </div>
                        </a>
                        
                        <a href="livroDoMesWoodyWoodpecker.html" title="Livro do Mes">
                            <div class="menu1Item">
                                Livro do Mês
                            </div>
                        </a>
                        
                        <a href="autoresDestaqueWoodyWoodpecker.html" title="Autores em Destaque">
                            <div class="menu1Item">
                                Autores em Destaque
                            </div>
                        </a>
                        
                        <a href="nossasLojasWoodyWoodpecker.html" title="Nossas Lojas">
                            <div class="menu1Item">
                                Nossas Lojas
                            </div>
                        </a>
                            
                        <a href="sobreLivrariaWoodyWoodpecker.html" title="Sobre a Livraria">
                            <div class="menu1Item">
                                Sobre a Livraria
                            </div>
                        </a>
                        
                        <a href="faleConoscoWoodyWoodpecker.php" title="Fale Conosco">
                            <div class="menu1Item">
                                Fale Conosco
                            </div>
                        </a>
                    </nav>

                    <div id="areaLogin"> <!-- AREA DE LOGIN DO CLIENTE -->
                        Usuário:
                        <p><input type="text" name="txtUsuario" size="24" class="textLogin" placeholder="User">
                        Senha:
                        <p><input type="password" name="txtSenha" size="24" class="textLogin">
                        <p><input type="button" name="btnEnviarLogin" value="OK" id="btnEnviarLogin">
                    </div>
                </header>
            </div>    
        
        <div id="principalFaleConosco"> <!-- DIV ABAIXO DO CABECALHO FIXADO -->
            
            
            <div id="conteudoFaleConosco"> <!-- CAIXA SUPERIOR -->
                
                <div id="conteudo2FaleConosco"> <!-- CAIXA INFERIOR -->
                    <div id="tituloPromocoes"> <!-- TITULO DO FALE CONOSCO -->
                        Fale Conosco
                    </div>
                    <div id="formulario"> <!-- DIV PARA GUARDAR TODO O FORMULÁRIO -->
                        <form name="frmFaleConosco" method="get" action="faleConoscoWoodyWoodpecker.php">
                        <div class="formItemEsquerdo1">
                            <label class="letrasFormulario">Nome:</label><span class="vermelho">*</span>
                            <br><input type="text" name="txtNomeContatos" placeholder=" Digite seu nome completo" size="60" class="txtEsquerdo1" id="nome" onkeypress="return validar(event, 'num', this.id);" required>
                        </div>
                        
                        <div class="formItemDireito1">
                            <label class="letrasFormulario">Profissão:</label><span class="vermelho">*</span>
                            <br><input type="text" name="txtProfissaoContatos" placeholder=" Digite a sua profissão" size="51" class="txtEsquerdo1" id="profissao" required>
                        </div>
                        
                        <div class="formItemEsquerdo1">
                            <label class="letrasFormulario">Email:</label><span class="vermelho">*</span>
                            <br><input type="email" name="txtEmailContatos" placeholder=" Digite seu e-mail" size="60" class="txtEsquerdo1" id="email" required>
                        </div>
                        
                        <div class="formItemDireito1">
                            <label class="letrasFormulario">Sexo:</label><span class="vermelho">*</span>
                            <br>
                            <div class="areaRadio">
                                <input type="radio" name="rdoSexo" class="rdoSexo" value="M" required>Masculino
                                <input type="radio" name="rdoSexo" value="F" required>Feminino
                            </div>
                        </div>
                        
                        <div class="formItemEsquerdo2">
                            <label class="letrasFormulario">Telefone:</label>
                            <br><input type="text" name="txtTelefoneContatos" placeholder=" Ex.: 00000000" size="51" class="txtEsquerdo1" id="txtTel" onkeypress="return validar(event, 'txt', this.id);" pattern="[0-9]{4}[0-9]{4}">
                        </div>
                        
                        <div class="formItemDireito2">
                            <label class="letrasFormulario">Celular:</label><span class="vermelho">*</span>
                            <br><input type="text" name="txtCelularContatos" placeholder=" Ex.: 900000000" size="51" class="txtEsquerdo1" id="txtCel" onkeypress="return validar(event, 'txt', this.id);" pattern="(9[0-9]{4}[0-9]{4})">
                        </div>
                        
                        <div class="formItemEsquerdo2">
                            <label class="letrasFormulario">Home Page:</label>
                            <br><input type="text" name="txtHomePageContatos" placeholder=" Digite a sua Home Page" size="51" class="txtEsquerdo1" id="txtHomePage">
                        </div>
                        
                        <div class="formItemDireito2">
                            <label class="letrasFormulario">Link do Facebook:</label>
                            <br><input type="text" name="txtLinkFacebookContatos" placeholder=" Digite o link do seu facebook" size="51" class="txtEsquerdo1" id="txtLinkFace">
                        </div>
                        
                        <div class="formItemEsquerdo3">
                            <label class="letrasFormulario">Informações de Produtos:</label>
                            <br><textarea name="textInfoProdutos" class="txtEsquerdoText" id="txtInfoProduto"></textarea>
                        </div>
                        
                        <div class="formItemDireito3">
                            <label class="letrasFormulario">Sugestões / Criticas:</label>
                            <br><textarea name="textSugestoesCriticas" class="txtDireitoText" id="txtSugCrit"></textarea>
                        </div>
                        
                        <div id="areaBtnEnviar"> <!-- BOTÃO PARA ENVIO DO FORMULÁRIO -->
                            <input type="submit" name="btnEnviar" value="Enviar" id="btnEnviar">
                        </div>
                        </form>
                    </div>
                        
                </div>
            </div>
            
            
            <footer> <!-- RODAPÉ -->
                Copiright 2018 - Todos os direitos reservados / Desenvolvido por: Vitoria Gonçalves
            </footer>
        </div>
        
        <script src="js/javaScript/script.js"></script>
    </body>
</html>