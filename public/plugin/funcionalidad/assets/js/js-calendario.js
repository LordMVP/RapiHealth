
/*document.write("<style>

	#calendar {

		width: 100%;
		height: 100%;
	}

	</style>");*/

var ordenar = '&orderby=';
$(document).ready(function(){


	$('#calendar').fullCalendar({
		theme: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: '2015-04-24',
		lang: 'es',
		editable: true,
		eventLimit: true,
		selectable: true,
		selectHelper: true,
		select: function(start, end) {
			alert("Hola -> " + start + " - " + end);
					/*var title = prompt('Event Title:');
					var eventData;
					if (title) {
						eventData = {
							title: title,
							start: start,
							end: end
						};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');*/
			},
			events: [
			{

				title: '<?php echo "Cumpleaños Fredy";?>',
				start: '2015-04-24'
			},
			{
				title: 'Cumpleaños',
				start: '2015-04-26',
				end: '2015-04-28'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2015-02-09T16:00:00'
			}
			]
		});
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
		url: "ajax/ajax_calendario.php?action=listar",
		success: function(data){
			var html = '<div id="calendar"></div>';
			/*if(data.length > 0){
				$.each(data, function(i,item){

					html += '<tr>'
					html += '<td>'+item.id_periodo+'</td>'
					html += '<td>'+item.fecha_inicial+'</td>'
					html += '<td>'+item.fecha_final+'</td>'
					html += '<td>'+item.dias+'</td>'					
					html += '<td>'+item.ano+'</td>'
					html += '<td>'+item.periodo+'</td>'
					html += '<td>'+item.estado+'</td>'
					html += '<td><a href="#" onclick="eliminar('+item.id_periodo+')">   <span class="fa fa-fw fa-wrench"></span> Editar </a> </td>'
					html += '<td><a href="#" onclick="eliminar('+item.id_periodo+')">   <span class="glyphicon glyphicon-trash"></span> Eliminar </a> </td>'
					html += '</tr>';
						//html += '</form>';														
					});					
}*/
//if(html == '') html = '<tr><td colspan="7" align="center">No se encontraron registros..</td></tr>'
$("#calendario").html(html);
}
});
}
