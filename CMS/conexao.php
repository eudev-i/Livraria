<?php
    function conexaoBD(){
        $host = "localhost";/*AONDE ESTÁ O BANCO DE DADOS (PODE SER COLOCADOS PO IP OU LOCAL) - localhost*/
        $database = "db_formulariofaleconosco";/*NOME NO MEU DATABASE - db_formulariofaleconosco*/
        $user = "root";/*USUSARIO QUE ME EU ME LOGO NO BANDO - root*/
        $password = "bcd127"; /*SENHA DO BANCO - bcd127*/

        /*PASSANDO INFORMAÇÕES PARA A BIBLIOTECA DO MYSQL, ESTABELECE A CONEXÃO COM O BANCO DE DADOS MSQL, USANDO A BIBLIOTECA MYSQLI*/
        if(!$conexao = mysqli_connect($host,$user,$password,$database))
             echo('erro no Banco');
        
        return $conexao;
    }
?>