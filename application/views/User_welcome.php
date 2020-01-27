<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <title>Users list</title> 
   </head>
	
   <body> 
   <div class="container">
    <h2 class="text">User List</h2>
      <table class="table table-striped"> 
         <?php 
            $i = 1; 
            echo "<thead><tr>"; 
            echo "<td>--</td>"; 
            echo "<th>username</th>"; 
            echo "<th>email</th>"; 
            echo "</tr></thead>"; 
				echo "<tbody>";
            foreach($records as $r) { 
               echo "<tr>"; 
               echo "<td>".$i++."</td>"; 
               echo "<td>".$r->username."</td>"; 
               echo "<td>".$r->email."</td>"; 
               echo "</tr>"; 
            } 
         ?>
         </tbody>
      </table> 
		
   </body>
	
</html>