<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $title ?></title>

	<link href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  	</script>
  	<script>
	function myFunction(cid, id) {
    if(confirm("Desea Eliminar el correo"))
	{ 
		window.location("http://localhost:8080/appCorreo/correo/eliminar/?cid="+ $cid +"&id="+ $id);
	}	
	}
</script>
</head>
<body>







