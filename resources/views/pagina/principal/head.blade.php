
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">

<!-- <script type="text/javascript" src="{{ asset('plugin/funcionalidad/js/jquery-2.2.0.js') }}"></script> -->
<!-- <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
-->

<script type="text/javascript" src="{{ asset('plugin/funcionalidad/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/funcionalidad/js/jquery-ui.min.js') }}"></script>



<link rel="stylesheet" type="text/css" href="{{ asset('plugin/principal/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/principal/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/principal/css/swipebox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/principal/css/jquery.ui.css') }}">


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<script src="{{ asset('plugin/principal/js/modernizr.custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugin/principal/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/principal/js/easing.js') }}"></script>	
<script type="text/javascript" src="{{ asset('plugin/principal/js/modernizr.custom2.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<link href="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugin/funcionalidad/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugin/funcionalidad/dist/css/timeline.css') }}" rel="stylesheet">
<link href="{{ asset('plugin/funcionalidad/dist/css/sb-admin-2.css') }}" rel="stylesheet">
<link href="{{ asset('plugin/funcionalidad/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
<link href="{{ asset('plugin/funcionalidad/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!-- Chosen -->
<link href="{{ asset('plugin/chosen/chosen.css') }}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>

<!-- trumbowyg -->
<script type="text/javascript" src="{{ asset('plugin/trumbowyg/dist/trumbowyg.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/trumbowyg/dist/ui/trumbowyg.css') }}">

<style type="text/css">


	div.tableContainer {
		width: 100%;       /* table width will be 99% of this*/
		height: 320px;    /* must be greater than tbody*/
		overflow: auto;
		margin: 0 auto;
	}

	table {
		width: 95%;  /*100% of container produces horiz. scroll in Mozilla*/
		border: none;
		border-spacing: 0px;
		background-color: transparent;
	}

	table>tbody {
		overflow: auto;
		/*height: 260px;*/
		overflow-x: hidden;
	}

	table>tbody tr {
		height: auto;
	}

	table>thead tr {
		position:relative;
		top: 0px;/*expression(offsetParent.scrollTop); IE5+ only*/
	}


</style>


<script type="text/javascript" src="{{ asset('plugin/principal/js/jquery.dataTables.min.js') }}"></script>