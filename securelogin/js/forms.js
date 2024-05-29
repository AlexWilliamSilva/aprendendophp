function formhash(form, password) {

    // elemento input que sera o campo para a senha com hash
    var p = document.createElement("input");

    // adicionando novo elemento ao formulário
    form.appendChild(p);

    p.name = "p";
    p.type = "hiden";
    p.value = hex_sha512(password.value);

    // verificar se a senha em texto simples será enviada
    password.value = "";

    // envie o formulario
    form.submit();
}

function regformhash(form, uid, email, password, conf) {

    // conferir se cada campo tem um valor
    if(uid.value == '' ||
       email.value == '' ||
       password.value == '' ||
       conf.value == '') {

        alert('You must provide all the requested details. Please try again');

        return false;
       }

       // verifique o nome do usuario
       re = /^\w+$/; 

       if(!re.test(form.username.value)) {

            alert("Username must contain only letters, numbers and underscores. Please try again"); 

            form.username.focus();

        returnfalse;
       }

       
}