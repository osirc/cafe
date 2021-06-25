window.addEventListener("load", ()=>{event.preventDefault(); event.stopPropagation();}, false);
        
function VerifyData() {
    let form = document.forms[0];
    let p=document.getElementById("Password").value;
    if(
        (p.length<8)||
        (p.length>45)||
        (p.search(/\d/g)<0)||
        (p.match(new RegExp("[A-Z]")).index<0)||
        (p.match(new RegExp("[a-z]")).index<0)
    ){
        alert("Contraseña inválida, pruebe de nuevo.\nRecuerde poner:\n-Entre 8 y 45 carácteres\n-Al menos una mayúscula\n-Al menos una minúscula\n-Al menos un número");
        return false;
    }
    if(p!==document.getElementById("VPassword").value){
        alert("Las contraseñas no coinciden");
        return false;
    }
    let request={
        firstName:form.Name.value,
        lastName:form.LastName.value,
        email:form.Email.value,
        cellphone:form.Phone.value,
        password:form.Password.value,
    }
    if(
        (request.firstName.length===0)||
        (request.lastName.length===0)||
        (request.email.length===0)||
        (request.cellphone.length===0)
    ){
        alert("Datos incompletos, por favor llene el formulario en su totalidad.")
        return false;
    }
    alert(`${request.firstName},${request.lastName},${request.email},${request.cellphone},${request.password}`);
    fetch(`../php/signup.php`, {
        method: 'POST',
        headers: new Headers({"Content-Type": `application/json;charset=utf-8`,}),
        body: JSON.stringify(request)
    })
    .then(response => {
        if (response.ok) {
            alert("Datos recibidos");
            return response.json();
        } else{
            alert(`Ocurrió un error, por favor inténtelo de nuevo`)
            return null;
        }
    })
    .then(data => {
            alert(data);
        }
    )
    .catch(err=>{
            console.error(err);
        }
    );
}