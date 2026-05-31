<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1{
            color:black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="6">
    <title>Document</title>
    
</head>
<body bgcolor=pink>
    <center>
        <h1>WELCOME TO DOGGY AI SHITT</h1>
        <h2>BRAZZERS DOGGY</h2>
        <table border=3px table:table-hover>
            <th>id</th>
            <th>distance</th>
            <th>created_at</th>
            <th>action</th>
            <?php
         include "connect.php";


         $result=$conn->query("SELECT * FROM zoteste");
         while($row=$result->fetch_assoc()){
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['distance']}</td>
            <td>{$row['created_at']}</td>
            <td><a href='delete.php?id=" .$row['id']."';
            onclick=\"return confirm('delete this user?');\">delete
            </td>
            </a>
                        </tr>";

             
             


         }

?>
        </table>
    </center>
    
</body>
</html>