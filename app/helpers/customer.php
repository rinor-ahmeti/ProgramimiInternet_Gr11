<?php

 function getTitlePosts()
    {
        $db = new Database;
      $db->query('SELECT * FROM posts WHERE title=:title');
      $db->bind(':title',$_GET['q']);
      $results=$db->resultSet();
      return $results;

    }



 if(isset($_GET['q']))
 {
   
   foreach (getTitlePosts($_GET['q']) as $rezultati) {


     echo "<table>";
     echo "<tr>";
     echo "<th>CustomerID</th>";
     echo "<td>" . $rezultati->title . "</td>";
     echo "<th>CompanyName</th>";
     echo "<td>" . $rezultati->body. "</td>";
     echo "<th>ContactName</th>";
     echo "<td>" . $rezultati->id . "</td>";
     echo "</tr>";
     echo "</table>";
     echo '<br><br>';
     }
 }


?>