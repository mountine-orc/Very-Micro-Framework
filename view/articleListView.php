<h1>Articles</h1>
<?php 
foreach($list as $row)
    print "<a href='/article/{$row["id"]}'>".$row['name']."</a><br><br>";
