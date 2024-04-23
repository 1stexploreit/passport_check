/* Archivo externo JS */
/*Visitar la web que hay un flejaso de ejemplos*/
// Función de ventana de alerta
function mensaje() {

  swal({
    title: 'Título',
    text: 'Mensaje de texto',
    html: '<p>Mensaje de texto con <strong>formato</strong>.</p>',
    type: 'success',
    timer: 3000,
  });
}

function mensaje2() {
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(function() {
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  })
}

function mensaje3(){
  swal({
    title: 'Yeeeaaaah!!!',
    text: '',
    imageUrl: 'https://wasabiBD.github.io/test-repo/dia2/images/feito.png',
    imageWidth: 164,
    imageHeight: 205,
    padding: 10,
    animation: true,
  });
}