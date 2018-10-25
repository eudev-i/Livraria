<?php
    require_once('conexao.php'); /*INCLUI O ARQUIVO QUE FAZ A CONXAO COM O BANCO DE DADOS*/

    $conexao = conexaoBD(); /*CHAMA A FUNÇÃO QUE ESTABELECE A CONEXÃO COM O BANCO DE DADOS*/
    
    $id_usuario = $_GET['id_usuario'];

    $sql = $sql= "select tbl_usuario.*, tbl_nivel_usuario.nome_nivel
                    from tbl_usuario, tbl_nivel_usuario
                    where tbl_usuario.id_nivel = tbl_nivel_usuario.id_nivel and tbl_usuario.id_usuario=".$id_usuario;
    
    $select = mysqli_query($conexao, $sql);

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
                  $('#containerUsuario').fadeOut(400);
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
                        <?php echo($nomeUsuario) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA PROFISSÃO -->
                    <div class="caixaForm4">
                        CELULAR:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($celularUsuario) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA EMAIL -->
                    <div class="caixaForm2">
                        TELEFONE:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($telefoneUsuario) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA SEXO -->
                    <div class="caixaForm1">
                        NÍVEL DO USUARIO:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($nomeNivelUsuario) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA TELEFONE -->
                    <div class="caixaForm3">
                        SEXO:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($sexoUsuario) ?>
                    </div>
                </div>
                
                <div class="linha"> <!-- LINHA CELULAR -->
                    <div class="caixaForm3">
                        LOGIN:
                    </div>
                    <div class="resultadoForm">
                        <?php echo($loginUsuario) ?>
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