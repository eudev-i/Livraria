<?php
    require_once('conexao.php'); /*INCLUI O ARQUIVO QUE FAZ A CONXAO COM O BANCO DE DADOS*/

    $conexao = conexaoBD(); /*CHAMA A FUNÇÃO QUE ESTABELECE A CONEXÃO COM O BANCO DE DADOS*/
    
    $id = $_GET['idRegistro'];

    $sql = "select * from tbl_form_fale_conosco where id=".$id;
    
    $select = mysqli_query($conexao, $sql);

    if($rs=mysqli_fetch_array($select)){
        $nome = $rs['nome'];
        $profissao = $rs['profissao'];
        $email = $rs['email'];
        $sexo = $rs['sexo'];
        $telefone = $rs['telefone'];
        $celular = $rs['celular'];
        $homePage = $rs['homePage'];
        $pageFacebook = $rs['pageFacebook'];
        $produto = $rs['produto'];
        $sugestoes = $rs['sugestoes'];
    }
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Modal</title>
        <link rel="stylesheet"
              type="text/css"
              href="css/style.css">
        
        <script src="js/jquery.js"></script>
        
        <script>
            $(document).ready(function(){
               $('.fechar').click(function(){ /*FUNCTION PARA FECHAR A MODAL*/
                  $('#container').fadeOut(400);
               });
            });
        </script>
    </head>
    <body>
        <div id="principalModal">
            <div id="conteudoModal">
                <div class="linha"> <!-- LINHA NOME -->
                    <div class="caixaForm1">
                        NOME:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($nome) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA PROFISSÃO -->
                    <div class="caixaForm4">
                        PROFISSÃO:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($profissao) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA EMAIL -->
                    <div class="caixaForm2">
                        E-MAIL:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($email) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA SEXO -->
                    <div class="caixaForm1">
                        SEXO:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($sexo) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA TELEFONE -->
                    <div class="caixaForm3">
                        TELEFONE:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($telefone) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA CELULAR -->
                    <div class="caixaForm3">
                        CELULAR:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($celular) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA HOME PAGE -->
                    <div class="caixaForm4">
                        HOME PAGE:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($homePage) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA LIK DO FACEBOOK -->
                    <div class="caixaForm5">
                        LINK DO FACEBOOK:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($pageFacebook) ?>
                    </div>
                </div>
                
                <div class="linha2"> <!-- LINHA INFORMAÇÕES DE PRODUTOS -->
                    <div class="caixaForm">
                        INFORMAÇÕES DE PRODUTOS:
                    </div>
                    <div class="resultadoForm2">
                        <?php echo($produto) ?>
                    </div>
                </div>
                
                <div class="linha2"> <!-- LINHA SUGESTÕES/CRITICAS -->
                    <div class="caixaForm">
                        SUGESTÕES/CRITICAS:
                    </div>
                    <div class="resultadoForm2">
                        <?php echo($sugestoes) ?>
                    </div>
                </div>
                
                <a href="#" class="fechar">
                    <div id="botaoFechar">
                        FECHAR
                    </div>
                </a>
            </div>
        </div>
    </body>
</html>