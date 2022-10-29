let btnsForm = document.querySelectorAll('.form-sa-delete');

btnsForm.forEach(function(btnForm) {
  btnForm.addEventListener("click", function(e) {
    e.preventDefault();

    Swal.fire({
    title: '¿Estás seguro?',
    text: 'Una vez eliminado no se podrá recuperar',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, elimínalo',
    cancelButtonText: 'Cancelar'
    })
    .then((result) => {
      if (result.isConfirmed) {
          this.submit();
      } else {
        Swal.fire({
          title: 'Sin cambios',
          icon: 'info',
        })
      }
    });
  });
});
