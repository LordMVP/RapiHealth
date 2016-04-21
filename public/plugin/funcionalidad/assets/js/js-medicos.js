// JavaScript Document
var ordenar = '&orderby=';
$(document).ready(function(){
	
	// Llamando a la funcion de busqueda al
	// cargar la pagina	
	filtrar();
	
	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });
	
	// boton cancelar
	$("#btncancel").click(function(){ 
		//alert("hola");
		$(".filtro input").val('')
		//$(".filtro select").find("option[value='0']").attr("selected",true)
		filtrar() 
	});
	
	// ordenar por
	$("#data th span").click(function(){
		var orden = '';
		if($(this).hasClass("desc"))
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("asc");
			ordenar = "&orderby="+$(this).attr("title")+" asc"		
		}else
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("desc");
			ordenar = "&orderby="+$(this).attr("title")+" desc"
		}
		//alert(ordenar);
		filtrar()
	});
});

function filtrar()
{	
	//alert(ordenar);
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax/ajax_medicos.php?action=listar",
		success: function(data){
			var html = '';
			if(data.length > 0){
				$.each(data, function(i,item){

					html += '<tr>'
							//html += '<td><input style="border:none" readonly="readonly" type="text" id="cedula" name="cedula" size="40" value="'+item.cedula+'"/></td>'
							
							html += '<td>'+item.cedula+'</td>'
							html += '<td>'+item.nombres+'</td>'
							html += '<td>'+item.apellidos+'</td>'
							html += '<td>'+item.direccion+'</td>'
							html += '<td>'+item.telefono+'</td>'
							html += '<td>'+item.email+'</td>'
							html += '<td>'+item.usuario+'</td>'
							html += '<td><a  href="consultar-pasajero-detalles.php?cedula='+item.cedula+'" >   <span class="glyphicon glyphicon-trash"></span> Editar  </a> </td>'
							
							html += '</tr>';														
						});					
			}
			if(html == '') html = '<tr><td colspan="7" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
		}
	});
}

function eliminar (msm) {
	//alert(msm);

	$.ajax({
		type:"POST",
		url: "php/eliminarperiodoemple.php",
		data: "id="+msm
	}).done(function(msg){
		if(msg == "ok"){
                	//alert("Eliminado con Exito");
                	
                	$(location).attr('href', 'http://www.sitefinity.com');
                }else{alert("Ha ocurrido un Error");}

            });
	
     //// window.location.reload();   
	// body...
}