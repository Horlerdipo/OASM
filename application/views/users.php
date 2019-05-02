<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Greetings</title>
</head>
<body>
	<table>
		<th>id</th>
		<th>name</th>
		<th>password</th>		
		<?php  
			foreach ($results as $value) {
				# code...
				echo("<td>".$value->id."</td>");
				
			}


		?>

	</table>
	

</body>
</html>