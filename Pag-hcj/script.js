let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');
let input = preveiwContainer.querySelectorAll('.input-quantity');


document.querySelectorAll('.contenedor-product .itemp .informacion .botonp .botondp').forEach(botondp =>{
  botondp.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    document.querySelectorAll('.contenedor-product .itemp').forEach(itemp =>{
      itemp.onclick = () =>{
    let name = itemp.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };});
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});

async function agregarProducto(idProducto){
  let productoCarrito = idProducto.split('-');
  productoCarrito = productoCarrito.reverse();
  productoCarrito = productoCarrito[0];

  const form = new FormData();
  form.append("id",productoCarrito);
  console.log(productoCarrito);
  const response = await fetch('./agregarProducto.php',{
    method: "POST",
    body: form
  }).then((response) => response.text())
  .then((text) => {
    alert(text);
  });
}