M.AutoInit(); 

function datos(){
     localStorage.setItem("nombres", document.getElementById('nombres').value)
     localStorage.setItem("apellidos", document.getElementById('apellidos').value)
     localStorage.setItem("correo", document.getElementById('correo').value)
}

function mensajeError(){
    document.getElementById('nombres').value=localStorage.getItem('nombres')
    document.getElementById('apellidos').value=localStorage.getItem('apellidos')
    document.getElementById('correo').value=localStorage.getItem('correo')
    // localStorage.clear();
    M.toast({
        html: 'ERROR USUARIO YA REGISTRADO!', 
        classes:"red rounded",
    })
}

function contraseña(){
    document.getElementById('nombres').value=localStorage.getItem('nombres')
    document.getElementById('apellidos').value=localStorage.getItem('apellidos')
    document.getElementById('correo').value=localStorage.getItem('correo')
    localStorage.clear();
    M.toast({
        html: 'ERROR LAS CONTRASEÑAS DEBEN SER IGUALES!', 
        classes:"red rounded",
    })
}

function actulizarmsn(){
    M.toast({
        html: 'datos actualizados', 
        classes:"green rounded",
    })
}

function verificarUsuario(){
    M.toast({
        html: 'correo o contraseña incorrecta', 
        classes:"red rounded",
    })
}

function agregarcrud(){
    M.toast({
        html: 'Datos Agregados Correctamente!', 
        classes:"green rounded",
    })
}

function agrregarcruderror(){
    M.toast({
        html: 'No se pudo agregar a la base de datos, revisar que la llave primaria no este registrada!', 
        classes:"red rounded",
    })
}

function busquedaerror(){
    M.toast({
        html: 'Dato no encontrado o no registrado en la base de datos', 
        classes:"red rounded",
    })
}

function actualizarcrud(){
    M.toast({
        html: 'Datos actualizados correctamente', 
        classes:"green rounded",
    })
}

function actualizarcruderror(){
    M.toast({
        html: 'Error al actualizar favor de intar despues', 
        classes:"red rounded",
    })
}

function eliminarcrud(){
    M.toast({
        html: 'Dato borrado exitosamente', 
        classes:"green rounded",
    })
}

function eliminarcruderror(){
    M.toast({
        html: 'Error al borrar el campo en la base de datos, intentarlo mas tarde', 
        classes:"red rounded",
    })
}


function slide(){
    let burguer= document.querySelector('.menu');
    let navegation=document.querySelector('.navegacion');
    navegation.classList.toggle("open");
    }

function Crud(){
     $('#mainbody').hide();
     $('#contenidoUsuario').load('crud.php');
         }

function EnviarPost(id){
    document.getElementById(id).submit();
}    
function enviar() {
var numvalores = tabla1.length;
for (i=0;i<numvalores;i++){
tabla1[i].selected = true;
tabla2[i].selected = true;
}
document.fmodificacion.submit();
}
