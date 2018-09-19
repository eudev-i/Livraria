//FUNCTION PARA VALIDAR CAMPOS NO FALE CONOSCO
function validar(caracter, blocktype, id) {
    /*document.getElementById(id).style = "background: #fff;";*/
                
    if(blocktype == "num") {
    /*Transformando a letra em ascii, o código de identificação*/
        if(window.event)
             var letra = caracter.charCode; 
        else
             var letra = caracter.which;
                
        if(letra > 47 && letra <= 57) {
            /*document.getElementById(id).style="background: #f00;";*/
            return false; /*Cancela a ação da tecla*/
        }  
                 
    } else if(blocktype == "txt") {
        if(window.event)
            var letra = caracter.charCode; 
        else
            var letra = caracter.which;
                
        if(letra < 47 || letra > 57) {
            /*document.getElementById(id).style="background: #f00;";*/
            return false; /*Cancela a ação da tecla*/
        }  
    } //fim elseif  
}