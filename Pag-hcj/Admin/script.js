const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const pdf_btn2 = document.querySelector('#toPDF2');
const pdf_btn3 = document.querySelector('#toPDF3');
const customers_table = document.querySelector('#customers_table');
const customers_table2 = document.querySelector('#customers_table2');
const customers_table3 = document.querySelector('#customers_table3');

const toPDF = function (customers_table) {
    const html_code = `
    <link rel="stylesheet" href="style.css">
    <main>
	<h3>Productos que se han vendido en el día</h3>
	<table>${customers_table.innerHTML}</table>
	</main>
    `;

    const new_window = window.open();
    new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 200);
}

function pdf() {
    toPDF(customers_table);
}

const toPDF2 = function (customers_table2) {
    const html_code = `
    <link rel="stylesheet" href="style.css">
    <main>
	<h3>Productos que hay en inventario</h3>
	<table>${customers_table2.innerHTML}</table>
	</main>
    `;

    const new_window = window.open();
    new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 200);
}

function pdf2(){
    toPDF2(customers_table2);
}

//Buscar con input en reportes
function buscar() {
	// Obtiene el valor del input de búsqueda
	var input = document.getElementById("busqueda");
	var filtro = input.value.toUpperCase();
  
	// Obtiene la tabla
	var tabla = document.getElementById("customers_table");
  
	// Obtiene las filas de la tabla
	var filas = tabla.getElementsByTagName("tr");
  
	// Recorre las filas de la tabla y oculta aquellas que no coinciden con la búsqueda
	for (var i = 0; i < filas.length; i++) {
		var celda = filas[i].getElementsByTagName("td")[1]; // Obtiene la segunda celda de la fila
		if (celda) {
		  if (celda.textContent.toUpperCase().indexOf(filtro) > -1) {
			filas[i].style.display = "";
		  } else {
			filas[i].style.display = "none";
		  }
		}
	  }
  }

//Reiniciar tabla
function reiniciarTabla() {
	var tabla = document.getElementById("customers_table");
	var filas = tabla.getElementsByTagName("tr");
  
	// Recorre las filas de la tabla y las muestra
	for (var i = 0; i < filas.length; i++) {
	  filas[i].style.display = "";
	}
  }
  
  function buscar2() {
	// Obtiene el valor del input de búsqueda
	var input = document.getElementById("busqueda2");
	var filtro = input.value.toUpperCase();
  
	// Obtiene la tabla
	var tabla = document.getElementById("customers_table2");
  
	// Obtiene las filas de la tabla
	var filas = tabla.getElementsByTagName("tr");
  
	// Recorre las filas de la tabla y oculta aquellas que no coinciden con la búsqueda
	for (var i = 0; i < filas.length; i++) {
		var celda = filas[i].getElementsByTagName("td")[1]; // Obtiene la segunda celda de la fila
		if (celda) {
		  if (celda.textContent.toUpperCase().indexOf(filtro) > -1) {
			filas[i].style.display = "";
		  } else {
			filas[i].style.display = "none";
		  }
		}
	  }
  }

  //Reiniciar tabla
function reiniciarTabla2() {
	var tabla = document.getElementById("customers_table2");
	var filas = tabla.getElementsByTagName("tr");
  
	// Recorre las filas de la tabla y las muestra
	for (var i = 0; i < filas.length; i++) {
	  filas[i].style.display = "";
	}
  }

  