
<?php
    
    include_once "connect_sql.php";
	
	$keyword = $_POST["keyword"];

    $query = ("select * 
    from (select id, type,name,growing_rate from dude 
    UNION select id, type,name,growing_rate from farm
     UNION select id, type,name,null from pound) AS T 
     NATURAL JOIN shop
     where name like '%".$keyword."%'");
	
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>life</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
        <script src="./js/bootstrap.min.js" ></script>
        <script src="./js/life.js" ></script>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/all.min.css">
        <link rel="stylesheet" href="./css/life.css">
        
        <script>
        
        </script>
    </head>

    <nav class="navbar navbar-dark bg-dark">
        <a class = "thick"><font color="white">關鍵字查詢 :  <?php echo $keyword ?></font></a>
        <a href="life.php"  class="btn btn-outline-success my-2 my-sm-0">Home</a>
    </nav>

    <body>
        <div class="container">
    `        <table class = "table table-hover" id="farm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>type</th>
                        <th>growing_rate</th>
                        <th>name</th>
                        <th>sold_price</th>
                        <th>bought_price</th>
                        <th>nutrition</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for($i = 0; $i <count($result);$i++)
                    {
                        echo "<tr>";
                        echo "<td>".$result[$i]['id']."</td>";
                        echo "<td>".$result[$i]['type']."</td>";
                        if($result[$i]['growing_rate'] != NULL)
                            echo "<td>".$result[$i]['growing_rate']."</td>";
                        else
                            echo "<td>0</td>";
                        echo "<td>".$result[$i]['name']."</td>";
                        echo "<td>".$result[$i]['sold_price']."</td>";
                        echo "<td>".$result[$i]['bought_price']."</td>";
                        echo "<td>".$result[$i]['nutrition']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </body>
</html>