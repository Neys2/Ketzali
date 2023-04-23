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