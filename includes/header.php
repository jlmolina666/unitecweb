<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Regsitro Unitec</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
	function pagoOnChange(sel) {
		  if (sel.value=="5"){
			  $('#div1').hide();
			  $('#interes2').empty();
			  $('#interes2').append('<option value="0"></option>');
		  }
		  if (sel.value=="6"){
			   $('#div1').show();
			   $('#interes2').empty();			   
			   $('#interes2').append('<option value="8">Lic. En Derecho</option>');
			   $('#interes2').append('<option value="9">Lic. En Finanzas</option>');
		  }
		  if (sel.value=="7"){
			   $('#div1').show();
			   $('#interes2').empty();
			   $('#interes2').append('<option value="10">Mtria. Admon. De Negocios</option>');
			   $('#interes2').append('<option value="11">Mtria. Direccion de proyectos</option>');
		  }
	}
	</script>
</head>
<body>