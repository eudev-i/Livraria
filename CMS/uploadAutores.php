<?php
    if($_POST['btnSalvar']=="SALVAR"){
            if(in_array($ext_arquivo,$arquivos_permitidos)){
                if($tamanho_arquivo <= 2000){
                    $arquivo_tmp = $_FILES['fleFoto']['tmp_name'];
                    $foto = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;
                    
                    if(move_uploaded_file($arquivo_tmp, $foto)){
                        /*
                        $sql ="INSERT INTO tbl_autor (nome_autor, foto_autor, biografia_autor)
                                VALUES('".$nomeAutor."','".$foto."','".$biografiaAutor."')";
                        */
                        /*RETORNA PARA A DIV VISUALIZAR A IMAGEM A SER EXIBIDA*/
                        echo("<img src='".$foto."'>");
                        
                    }
                    else{
                        echo("NÃO FOI POSSÍVEL ENVIAR O ARQUIVO PARA O SERVIDOR");
                    }
                }
                else{
                    echo("TAMANHO O ARQUIVO INVÁLIDO");
                }
            }
            else{
                echo("EXTENSÃO INVÁLIDA");
            }
        }
?>