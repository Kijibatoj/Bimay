function preguntar(id){
    Swal.fire({
        type: 'warning',
        title: '¿Estas seguro que quieres borrar este producto del carrito?',
        showConfirmButton: true,
        confirmButtonColor: '#432C7A',
        confirmButtonText: 'Continuar',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        allowOutsideClick: false
    }).then((result)=>{
        if(result.value){
             window.location.href= "TuCarrito.php?del="+id;
        }
    })
}