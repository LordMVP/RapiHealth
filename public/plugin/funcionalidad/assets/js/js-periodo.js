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
		url: "ajax/ajax_periodo.php?action=listar",
			success: function(data){
				var html = '';
				if(data.length > 0){
					$.each(data, function(i,item){

						html += '<tr>'
							html += '<td>'+item.id_periodo+'</td>'
							html += '<td>'+item.fecha_inicial+'</td>'
							html += '<td>'+item.fecha_final+'</td>'
							html += '<td>'+item.dias+'</td>'					
							html += '<td>'+item.ano+'</td>'
							html += '<td>'+item.periodo+'</td>'
							html += '<td>'+item.estado+'</td>'
						html += '<td><a href="#" onclick="eliminar('+item.id_periodo+')">   <span class="glyphicon glyphicon-trash"></span> Eliminar </a> </td>'
							//
						html += '</tr>';
						//html += '</form>';														
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
            url: "ajax/eliminarperiodoemple.php",
            data: "id="+msm
            }).done(function(msg){
                if(msg == "ok"){
                	//alert("Eliminado con Exito");
                	alert("Eliminacion Satisfactoria");
                    window.location="crear_periodos.php";

					//$(location).attr('href', 'http://localhost/conjunto/periodo_empleados.php');
                }else{alert("Ha ocurrido un Error");}

              });
              
     //// window.location.reload();   
	// body...
}