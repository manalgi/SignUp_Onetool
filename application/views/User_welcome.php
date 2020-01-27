<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Users list</title> 
   </head>
	
   <body> 
      <table border = "1"> 
         <?php 
            $i = 1; 
            echo "<tr>"; 
            echo "<td>--</td>"; 
            echo "<td>username</td>"; 
            echo "<td>email</td>"; 
            echo "</tr>"; 
				
            foreach($records as $r) { 
               echo "<tr>"; 
               echo "<td>".$i++."</td>"; 
               echo "<td>".$r->username."</td>"; 
               echo "<td>".$r->email."</td>"; 
               echo "</tr>"; 
            } 
         ?>
      </table> 
		
   </body>
	
</html>