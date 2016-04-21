// JavaScript Document
var ordenar = '&orderby=';
$(document).ready(function(){

	$("#periodo").click(function(){ filtrar() });
	
	$('#periodo').prop('disabled', false).trigger("chosen:updated");

	$("#fecha_cita").change(function(){ filtrar($("#fecha_cita").val()) });

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

function filtrar(fechaa)
{		
	//alert('hola');
	var dias = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "../../../plugin/funcionalidad/ajax/ajax_citas.php?action=listar",
		//url: "{{ asset('plugin/funcionalidad/ajax/ajax_citas.php') }}",
		//data: "action=listar",
		//url: "{{ asset('plugin/funcionalidad/ajax/ajax_citas.php') }}" + "?action=listar",
		success: function(data){

			//alert(fechaa);
			var html = '';
			var i = 0;
			var y = 0;
			var x = 0;
			var z = 0;
			var aux = 0;

			var html = '';
			
			var matriz=new Array(data.length);

			for (t = 0; t < data.length; t++){
				matriz[t]=new Array(data.length);
			}

			for (t=1; t< data.length; t++)
			{
				matriz[t-1][0] = data[t].fecha;
				matriz[t-1][1] = data[t].hora;
			}

			/*for (t=0; t< data.length-1; t++)
			{
				document.write(matriz[t][0] + " - ");
				document.write(matriz[t][1] + " <br> ");
			}*/

			for (var ii = 0; ii < 12; ii++) {
				if (meses[ii] == data[0].periodo){
					aux = ii + 1;							
				}
			}
			//alert(data.length);
			if(data.length > 0){

				if (fechaa != null && fechaa != "") {

					var elem = fechaa.split('/');
					var ano = elem[0];
					var mes = elem[1];
					var dia = elem[2];

					for (var ii = 0; ii < 12; ii++) {
						if (meses[ii] == data[0].periodo){
							aux = ii + 1;	
						}
					}

					mes = parseInt(mes);

					if (meses[mes-1] == data[0].periodo) {

						//for (i = 1, y = 1; i <= data[0].dias; i++, y++) { 
							var b = 0;
							for  (x=14, z=0; x <= 20; x++, z=z+30) { 

								if (z == 60) {
									z = 00;
								}

								if (z == 30) {
									x = x-1;
								}

								if (b == data.length) {
									b = 0;
								}

								var fec = (data[0].ano+'/'+aux+'/'+dia);
								var aa = aux + 0;
								var fecha_envio = (data[0].ano+'/'+aa+'/'+dia);
								var env_hora = 0;
								var env_min = 0;

								//alert(fec);
								var fecha = new Date(fec);

								var horas = x;
								var min = z;
								var minutos = min%60;
								var h=0;
								h=parseInt(min/60);
								horas+=h;
								var hora = 0;

								if (z == 0) {
									var hora = horas + ':' + minutos + '0';
									env_hora = horas;
									env_min = minutos;
								}else{
									var hora = horas + ':' + minutos;
									env_hora = horas;
									env_min = minutos;
								}				

								var fecha_aux = fecha.getDate('d') + '/' + meses[fecha.getMonth()]+ '/' + fecha.getFullYear();
								var fecha_envio = fecha.getDate('d') + '/' + (fecha.getMonth()+1)+ '/' + fecha.getFullYear();
								//alert(data[0].aux_fecha);
								//Date.parse(fecha_envio);
								data[0].aux_fecha = fec;

								html += '<tr>'
								html += '<td>'+dias[fecha.getDay()]+'</td>';
								html += '<td>'+fecha_aux+'</td>';
								html += '<td>'+hora+'</td>';

								var fecha2 = matriz[b][0] + "";

								/*var elem2 = fecha2.split('/');
								var dia2 = parseInt(elem2[2]);
								var mes2 = parseInt(elem2[1]);
								var ano2 = parseInt(elem2[0]);*/

								var fecha_bd = (ano2+'/'+mes2+'/'+dia2);

								var fecha_envio = fecha_envio.split('/');
								var dia2 = parseInt(fecha_envio[0]);
								var mes2 = parseInt(fecha_envio[1]);
								var ano2 = parseInt(fecha_envio[2]);

								//var horass = parseInt(hora);

								fecha_envio = ano2 + '/' + mes2 + '/' + dia2;
								
								//alert(fecha_bd);
								//if (fecha_bd == fec) {
									if (matriz[b][1] == hora) {
										html += '<td>Asignado</td>'
										html += '<td><a disabled class="btn btn-primary"'
										html += ' onclick="cambio('+ano2+', '+mes2+', '+dia2+', '+env_hora+', '+env_min+')">  <span class="glyphicon glyphicon-remove"></span> </a> </td>'	
										/*html += '<a class="btn btn-success"'
										html += 'onclick="cambio()">  <span class="glyphicon glyphicon-eye-open"></span> </a> </td>'		*/

										b++;
									}
									else{
										html += '<td>Libre</td>'
										html += '<td><a class="btn btn-primary"'
										html += ' onclick="cambio('+ano2+', '+mes2+', '+dia2+', '+env_hora+', '+env_min+')">  <span class="glyphicon glyphicon-ok"></span> </td>'	
										
									}
									/*}
									else{
										html += '<td>Libre</td>'
										html += '<td><a class="btn btn-primary" data-toggle="modal" data-target="#myModalsss" onclick="cambio('+data[0].id+')">  <span class="glyphicon glyphicon-trash"></span> Editar  </a> </td>'								
									}	*/			
								}
								//}
							}else{
								html = '<tr><td colspan="7" align="center">La Fecha No Corresponde Al Mes Deseado..</td></tr>'
							}
						}else{
							//alert('nulla');

							for (i = 1, y = 1; i <= data[0].dias; i++, y++) { 
								var b = 0;
								for  (x=14, z=0; x <= 20; x++, z=z+30) { 

									if (z == 60) {
										z = 00;
									}

									if (z == 30) {
										x = x-1;
									}

									if (b == data.length) {
										b = 0;
									}

									var fec = (data[0].ano+'/'+aux+'/'+i);

									var fecha = new Date(fec);

									var horas = x;
									var min = z;
									var minutos = min%60;
									var h=0;
									h=parseInt(min/60);
									horas+=h;
									var hora = 0;
									var env_hora = 0;
									var env_min = 0;

									if (z == 0) {
										var hora = horas + ':' + minutos + '0';
										env_hora = horas;
										env_min = minutos;
									}else{
										var hora = horas + ':' + minutos;
										env_hora = horas;
										env_min = minutos;
									}					

									var fecha_aux = fecha.getDate('d') + '/' + meses[fecha.getMonth()]+ '/' + fecha.getFullYear();
									var fecha_envio = fecha.getDate('d') + '/' + (fecha.getMonth()+1)+ '/' + fecha.getFullYear() + ' TFG';
									//alert(fecha_envio);
									data[0].aux_fecha = fecha_envio;

									html += '<tr>'
									html += '<td>'+dias[fecha.getDay()]+'</td>';
									html += '<td>'+fecha_aux+'</td>';
									html += '<td>'+hora+'</td>';

									var fecha2 = matriz[b][0] + "";

									/*var elem2 = fecha2.split('/');
									var dia2 = parseInt(elem2[2]);
									var mes2 = parseInt(elem2[1]);
									var ano2 = parseInt(elem2[0]);*/

									var fecha_bd = (ano2+'/'+mes2+'/'+dia2);

									var fecha_envio = fecha_envio.split('/');
									var dia2 = parseInt(fecha_envio[0]);
									var mes2 = parseInt(fecha_envio[1]);
									var ano2 = parseInt(fecha_envio[2]);

									//var horass = parseInt(hora);

									fecha_envio = ano2 + '/' + mes2 + '/' + dia2;
									//fecha_envio = "que putas pasa";
									//alert(fecha_envio);

									if (fecha_bd == fec) {
										if (matriz[b][1] == hora) {
											html += '<td>Asignado</td>'
											html += '<td><a disabled class="btn btn-primary"'
											html += ' onclick="cambio('+ano2+', '+mes2+', '+dia2+', '+env_hora+', '+env_min+')">  <span class="glyphicon glyphicon-remove"></span> </a> </td>'
											/*html += '<a class="btn btn-success"'
											html += 'onclick="cambio()">  <span class="glyphicon glyphicon-eye-open"></span> </a> </td>'*/		

											b++;
										}
										else{
											html += '<td>Libre</td>'
											html += '<td><a class="btn btn-primary"'
											html += ' onclick="cambio('+ano2+', '+mes2+', '+dia2+', '+env_hora+', '+env_min+')">  <span class="glyphicon glyphicon-ok"></span>  </a> </td>'		
											//html += '<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary"></a> </td>'						
										}
									}
									else{
										html += '<td>Libre</td>'
										html += '<td><a class="btn btn-primary"'
										html += ' onclick="cambio('+ano2+', '+mes2+', '+dia2+', '+env_hora+', '+env_min+')">  <span class="glyphicon glyphicon-ok"></span>  </a> </td>'								
										//html += '<a title="Ver" id="verpdf" name="verpdf" class="glyphicon glyphicon-eye-open btn btn-primary"></a> </td>'

										/*html += '<td>Libre</td>'
										html += '<td><a class="btn btn-primary" data-toggle="modal" data-target="#myModalsss" onclick="cambio('+data[0].id+')">  <span class="glyphicon glyphicon-trash"></span> Editar  </a> </td>'							
										*/
									}				
								}
							}
						}
					}

					if(html == '') html = '<tr><td colspan="7" align="center">No se encontraron registros..</td></tr>'
						$("#data tbody").html(html);
				}
			});
}
function cambio (año, mes, dia, horas, minutos) {

	var validacion = false;

	sel_medico = document.getElementById('medico');
	sel_paciente = document.getElementById('cedula');
	sel_especialidad = document.getElementById('especialidad');
	sel_periodo = document.getElementById('periodo');

	if (sel_medico.value == "" || sel_paciente.value == "" || sel_especialidad.value == "" || sel_periodo.value == ""){
		alert("Complete Los Datos Para Continuar Con La Asignacion");
	}else {
		validacion = true;
	}

	if(validacion == true){

		var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
		
		var fecha = año + '/' + mes + '/' + dia;
		var m_fecha = meses[mes-1] + ' ' + dia + ' Del ' + año;

		var minuto = minutos;

		if(minutos == '0'){
			minutos = '00';
		}

		var hora = horas + ':' + minutos;
		//$('#fechaa').val(año + ' - ' + mes + ' - ' + dia + ' | ' + hora + ':' + minuto);
		$('#hora').val(hora);
		$('#fecha').val(fecha);
		
		var c_hora=document.getElementById("cita_hora");
		c_hora.innerHTML = hora;

		var c_fecha=document.getElementById("cita_fecha");
		c_fecha.innerHTML = m_fecha;

		$('#asignacion_muestra').show();
		$('#asignacion').hide();

		// Paciente

		$.ajax({
			type:"POST",
			url: "../../../plugin/funcionalidad/ajax/usuario.php",
			data: "id="+$('#cedula').val()
		}).done(function(data){

			var json = $.parseJSON(data);
			//alert(json[0]['nombre']);

			var id_paciente=document.getElementById("id_paciente");
			id_paciente.innerHTML=$('#cedula').val();

			var nombre_paciente=document.getElementById("nom_paciente");
			nombre_paciente.innerHTML=json[0]['nombre'] + ' ' + json[0]['apellido'];

			var email_paciente=document.getElementById("email_paciente");
			email_paciente.innerHTML=json[0]['email'];

			var telefono_paciente=document.getElementById("tel_paciente");
			telefono_paciente.innerHTML=json[0]['telefono'];
			document.getElementById('img_paciente').src='../../../plugin/imagenes/'+ json[0]['imagen'];
		}); 



// Medico

$.ajax({
	type:"POST",
	url: "../../../plugin/funcionalidad/ajax/usuario.php",
	data: "id="+$('#medico').val()
}).done(function(data){

	var json = $.parseJSON(data);
	//alert(json[0]['nombre']);

	var id_medico=document.getElementById("id_medico");
	id_medico.innerHTML=$('#medico').val();

	var nombre_medico=document.getElementById("nom_medico");
	nombre_medico.innerHTML=json[0]['nombre'] + ' ' + json[0]['apellido'];

	var email_medico=document.getElementById("email_medico");
	email_medico.innerHTML=json[0]['email'];

	var telefono_medico=document.getElementById("tel_medico");
	telefono_medico.innerHTML=json[0]['telefono'];
	document.getElementById('img_medico').src='../../../plugin/imagenes/'+ json[0]['imagen'];
	//setTimeout( "document.getElementById('img_paciente').src='../../plugin/imagenes/"+ json[0]['imagen'] +"'", 0000 )
}); 

// especialidad

$.ajax({
	type:"POST",
	url: "../../../plugin/funcionalidad/ajax/especialidad.php",
	data: "id="+$('#especialidad').val()
}).done(function(data){

	var json = $.parseJSON(data);
	//alert(json);

	var especialidad=document.getElementById("cita_especialidad");
	especialidad.innerHTML = json[0]['nombre'];
	//setTimeout( "document.getElementById('img_paciente').src='../../plugin/imagenes/"+ json[0]['imagen'] +"'", 0000 )
}); 

}

}
