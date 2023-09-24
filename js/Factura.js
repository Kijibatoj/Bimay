function factura(){
    Swal.fire({   
        type: 'warning', 
        title: 'La factura se esta descargando!',
        padding:'1rem',
        backdrop: true,
        toast: true,
        position: 'bottom-end',
        confirmButtonColor: '#432C7A',
        timer: 4000,
        timerProgressBar: true,
       
    })
    javascript:window.print()
    }