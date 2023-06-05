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

async function agregarProducto(idProducto, opcion = 1){
  if(opcion == 1){
    let productoCarrito = idProducto.split('-');
    productoCarrito = productoCarrito.reverse();
    productoCarrito = productoCarrito[0];

    const form = new FormData();
    form.append("id",productoCarrito);
    form.append("cantidad",1);
    console.log(productoCarrito);
    const response = await fetch('./agregarProducto.php',{
      method: "POST",
      body: form
    }).then((response) => response.text())
    .then((text) => {
      alert(text);
    });
  }else if(opcion == 2){
    //Agregar con cantidad
    let productoCarrito = idProducto.split('-');
    productoCarrito = productoCarrito.reverse();
    productoCarrito = productoCarrito[0];

    let cantidadProducto = document.getElementById("producto-"+productoCarrito+"-cantidad").value;

    const form = new FormData();
    form.append("id",productoCarrito);
    form.append("cantidad",cantidadProducto);
    console.log(productoCarrito);
    const response = await fetch('./agregarProducto.php',{
      method: "POST",
      body: form
    }).then((response) => response.text())
    .then((text) => {
      alert(text);
    });
  }else{
    return "Error de sintáxis";
  }
}

function mostrarPopup(mensaje) {
  var popup = document.createElement("div");
  popup.className = "popup";
  popup.innerHTML = "<p>" + mensaje + "</p>";
  document.body.appendChild(popup);
  popup.style.display = "block";

  setTimeout(function() {
      popup.style.display = "none";
      document.body.removeChild(popup);
  }, 3000); // Ocultar el popup después de 3 segundos
}