//FUNCTION PARA VALIDAR CAMPOS NO FALE CONOSCO
function validar(caracter, blocktype, id) {
    
                
    if(blocktype == "num") {
    /*Transformando a letra em ascii, o código de identificação*/
        if(window.event)
             var letra = caracter.charCode; 
        else
             var letra = caracter.which;
                
        if(letra > 47 && letra <= 57) {
            
            return false; /*Cancela a ação da tecla*/
        }  
                 
    } else if(blocktype == "txt") {
        if(window.event)
            var letra = caracter.charCode; 
        else
            var letra = caracter.which;
                
        if(letra < 47 || letra > 57) {
            
            return false; /*Cancela a ação da tecla*/
        }  
    } //fim elseif  
}