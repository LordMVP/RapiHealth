// JavaScript Document
var ordenar = '&orderby=';
$(document).ready(function(){
	
	// Llamando a la funcion de busqueda al
	// cargar la pagina	
	filtrar();
	
	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });
	
	// boton cancelar
	//$("#btncancel").click(function(){ 
		//alert("hola");
	//	$(".filtro input").val('')
		//$(".filtro select").find("option[value='0']").attr("selected",true)
	//	filtrar() 
	//});

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
		url: "ajax/ajax_asignados.php?action=listar",
		success: function(data){
			//alert(data);
			var html = '';
			//var html2 = '';
			if(data.length > 0){
				$.each(data, function(i,item){
					//alert(item['carga']);
					html += '<input type="hidden" id="carga" name="carga" value="'+item['carga']+'">';
					html += '<input type="hidden" id="periodo" name="periodo" value="'+item['id_periodo']+'">';
					html += '<input type="hidden" id="dias" name="dias" value="'+item['dias']+'">';
					//html += '<input type="text" id="carga" disabled value="'+item['carga']+'" name="carga"></input>'
					if (item['carga'] == "Si") {
						//html += '<input type="text" id="carga" value="'+item['carga']+'" name="carga"></input>'
						html += '<embed src="turnos/'+item['periodo']+'_'+item['ano']+'.pdf" width="100%" height="500">'
						return false;

					}else if (item['carga'] == "No") {
						html += ' <tr>'
							//html += '<td><input style="border:none" readonly="readonly" type="text" id="cedula" name="cedula" size="40" value="'+item.cedula+'"/></td>'
							
							//html += '<td>'+item.id_periodo+'</td>'
							html += '<td>'+item['cedula']+'</td>'
							html += '<td><label style="width:180px">'+item['nombres']+ ' ' +item['apellidos']+'</label></td>'
							html += '<td><input style="width:35px" name="horas_'+item['cedula']+'" id="horas_'+item['cedula']+'" value="'+item['horas']+'" readonly> </input></td>'
							//alert(item.dias);
							for (var i = 1; i <= item['dias']; i++) {
								//html += '<td>Dia'+i+'</td>'
								html += '<td ><input style="width:35px" value="'+item[i]+'" name="'+item['id_periodo']+'_'+item['cedula']+'_'+i+'" id="'+item['id_periodo']+'_'+item['cedula']+'_'+i+'" onchange="horasasignadas('+item['id_periodo']+','+item['cedula']+','+i+','+item['dias']+')"> </input></td>'
							};
							html += '</tr>';
						}
					});					
}
if(html == '') html = '<tr><td colspan="7" align="center">No se encontraron registros..</td></tr>'
	$("#data tbody").html(html);
}
});
}


function horasasignadas(periodo, cedula, dia, dias){

	//alert('Horas maximas por empleado');
	var dato = parseInt(document.getElementById("horas_"+cedula).value);
	/*dato = dato + dato; 
	document.getElementById("horas_"+cedula).value = dato;
	alert(dato);*/

	var x = document.getElementById(periodo+'_'+cedula+'_'+dia);
	x.value = x.value.toUpperCase();

	//if (dato > 0 && dato < 24) {
		document.getElementById("horas_"+cedula).value = 0;

		for(var i = 1; i <= dias; i++){
			//dato = parseInt(document.getElementById("horas_"+cedula).value);

			if (document.getElementById(periodo+'_'+cedula+'_'+i).value == 'M') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (6);
				document.getElementById("horas_"+cedula).value = n1;
			}else if (document.getElementById(periodo+'_'+cedula+'_'+i).value == 'T') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (6);
				document.getElementById("horas_"+cedula).value = n1;
			}else if (document.getElementById(periodo+'_'+cedula+'_'+i).value == 'C') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (12);
				document.getElementById("horas_"+cedula).value = n1;	
			}else if (document.getElementById(periodo+'_'+cedula+'_'+i).value == 'N') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (12);
				document.getElementById("horas_"+cedula).value = n1;
			}else if (document.getElementById(periodo+'_'+cedula+'_'+i).value == 'L') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (0);
				document.getElementById("horas_"+cedula).value = n1;
			}else if (document.getElementById(periodo+'_'+cedula+'_'+i).value == '') {
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (0);
				document.getElementById("horas_"+cedula).value = n1;
			}else{
				document.getElementById(periodo+'_'+cedula+'_'+i).value = ''
				n1 = parseInt(document.getElementById("horas_"+cedula).value);
				n1 = n1 + (0);
				document.getElementById("horas_"+cedula).value = n1;	
			}
			if (n1 > 186) {
				document.getElementById("horas_"+cedula).value = dato;
				document.getElementById(periodo+'_'+cedula+'_'+i).value = ''
				alert('Se excede de las horas maximas');
			}

			/*if (dato = 186 && document.getElementById(periodo+'_'+cedula+'_'+i).value == '') {
				//document.getElementById("horas_"+cedula).value = 186;
				document.getElementById(periodo+'_'+cedula+'_'+i).value = 'L'
				//alert('Se excede de las horas maximas');
			}else 
			if (dato < 186 && document.getElementById(periodo+'_'+cedula+'_'+i).value == 'L') {
				//document.getElementById("horas_"+cedula).value = dato;
				document.getElementById(periodo+'_'+cedula+'_'+i).value = ''
			}*/
		}
	/*}else{
		alert('Horas Maximas asignadas por empleado');
		document.getElementById("horas_"+cedula).value = dato;
		document.getElementById(periodo+'_'+cedula+'_'+dia).value = '';
	}*/
}