(function(win,doc){
    'use strict';    
    function confirmDel(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;

        if(confirm( 'Deseja realmente deletar ? ')){
            let ajax = new XMLHttpRequest();
            ajax.open('DELETE',event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    var url = window.location.pathname;
                    win.location.href = url;
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }
    
    if(doc.querySelector('.js-del-user')){
        let btn = doc.querySelectorAll('.js-del-user');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click',confirmDel);
        }
    }
    if(doc.querySelector('.js-del-project')){
        let btn = doc.querySelectorAll('.js-del-project');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click',confirmDel);
        }
    }

})(window,document)

$('#msg').delay(4000).slideUp(300);


$("form").on('focus', '#Name' , function() {
    document.getElementById("Name").onkeypress = function(e) {
        var chr = String.fromCharCode(e.which);
        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM ".indexOf(chr) < 0) return false;
    };
});


$(".edit").click(function (){
    let type = $(this).attr('id');
    let type_value = $(this).attr('name');
    let field;
    let typeInput = 'text';

    switch (type) {
        case 'Name':
            field = 'modal_update_name';
            break;        
        case 'Email_contact':
            field = 'modal_update_email_contact';
            typeInput = 'email';
            break;
        case 'Email':
            field = 'modal_update_email';
            typeInput = 'email';
            break;
        case 'Password':        
            field = 'modal_update_password';
            typeInput = 'password';
            break;     
    }    
    $("#modal_update_name").empty();
    $("#modal_update_email_contact").empty();
    $("#modal_update_email").empty();
    $("#modal_update_password").empty();

    $("#"+field).append(

            "<div class='modal-body'>"+
                "<div id='field_type' >"+

                "</div>"+
            "</div>"+

            "<div class='modal-footer'>"+
                "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>"+
                "<button type='submit' class='btn btn-primary'>Salvar</button>"+
            "</div>"
    );

    if(type !== 'Password'){
        $("#field_type").append(
            "<p class='fs-5'>"+ type_value  +"</p>"+

            "<div class='form-floating mb-3'>" +        
                "<input type="+typeInput+" name="+type+" id="+type+" class='@error("+type+") @enderror form-control form-control-lg' placeholder='Novo valor' required >" +
                "<label for="+type+">Alterar para: </label>" +                 
            "</div>" 
        );
    
    }else{
        $("#field_type").append(
        "<p class='fs-5'>Senha ***************</p>"+

        "<div class='form-floating mb-3'>" +
        "<input type="+typeInput+" name='outPassword' id='Password' class='form-control form-control-lg' minlength='8' maxlength='15'  placeholder='Senha atual'  required autofocus>" +
            "<label for='outPassword'>Senha atual: </label>"   +                 
        "</div>" +

        "<div class='form-floating mb-3'>" +       
        "<input type="+typeInput+" name='newPassword' id='Password' class='form-control form-control-lg'  minlength='8' maxlength='15' placeholder='Nova senha' required >" +
            "<label for='newPassword'>Nova senha: </label>"   +                 
        "</div>" + 

        "<div class='form-floating mb-3'>" +       
        "<input type="+typeInput+" name='ConfirmNewPassword' id='Password' class='form-control form-control-lg'  minlength='8' maxlength='15' placeholder='Nova senha' required >" +
            "<label for='ConfirmNewPassword'>Comfirmar nova senha: </label>"   +                 
        "</div>" 

        );
    }

});


var count = 1;
$(".addfiled").click(function(){
    count++;

    $("#field-url").append(
        "<div id='formUrl"+count+"' class='input-group mb-2'>"+
            "<input  id='SearchSource' name='SearchSource[]' class='form-control bg-my-secondary' placeholder='url, livro, pessoa, etc...'>"+
            "<button id='"+count+"' type='button' class='removefield btn btn-outline-danger px-4'> <i class='fas fa-minus'></i> </button>"+
        "</div>"
    );
  
});

$('form').on('click', '.removefield',function(){ 
    let btn_id = $(this).attr('id');
    $("#formUrl"+btn_id).remove();
});
  
 
$('#DataDiary').change(function(){ 
    let inputDate =  $(this).val(); 
    let date = new Date();
    let today =  date.getFullYear() + "-" +'0'+ (date.getMonth()+1) + "-" + date.getDate();    
    if(inputDate > today){
        $(this).css('color','red');
    }else{
        $(this).css('color','green');
    }
});
