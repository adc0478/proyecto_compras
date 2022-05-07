

function accion(id){
	datos = new FormData();
	datos.append('id',id);
	datos.append('precio',parseFloat (document.getElementById('precio'+ id).value));
	datos.append('fecha',document.getElementById('fecha' + id).value);
	datos.append('cantidad',document.getElementById('cantidad'+id).value);
	let url = 'action/comprar.php';
	let opcion ={
		method:'POST',
		body:datos
	}
	fetch(url,opcion)
		.then(respuesta =>respuesta.text())
		.then(function(){location.reload()});
}
function filtrar(){
	let tipo = document.querySelector('select').value; 
	filtrar_elementos(tipo);
}
function filtrar_elementos(tipo){
	let nodo = document.querySelector('tbody');
	let clase = "";
	for (var i=2; i< nodo.childNodes.length;i++){
		clase = nodo.childNodes[i].className;
		if (tipo === clase){
			document.getElementById(nodo.childNodes[i].id).style.display="table-row";
		}else if (tipo==="todos"){
			document.getElementById(nodo.childNodes[i].id).style.display="table-row";
		}else{
			document.getElementById(nodo.childNodes[i].id).style.display="none";
		}
	}
}

function accion_prod(codProd,id){
   //obtener datos a enviar a php
  if (document.getElementById('inp' + codProd).value != ""){
      let datos = new FormData();
      if (typeof(id)!='undefined'){
         datos.append('identificacion',id);
      }
      datos.append('cantidad',document.getElementById('inp' + codProd).value);
      datos.append('codigo',codProd);
       let url = 'action/agregarelemento.php';
      if (document.getElementById('inp' + codProd).value > 0){
       fetch (url,{
         method:'POST',
         body: datos
       })
       .then (response=> response.text())
       .then (respuesta => location.reload());
  }}
}
