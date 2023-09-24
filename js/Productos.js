

function preguntar(id){
    Swal.fire({
        type: 'warning',
        title: '¿Estas seguro que quieres borrar este registro?',
        showConfirmButton: true,
        confirmButtonColor: '#432C7A',
        confirmButtonText: 'Continuar',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        allowOutsideClick: false
    }).then((result)=>{
        if(result.value){
             window.location.href= "Dashboard.php?del="+id;
        }
    })
}
    
 






