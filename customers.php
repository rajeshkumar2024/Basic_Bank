
<?php

require_once "pdo.php";


$stmt = $pdo->query("SELECT * from customer");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>


<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rajesh Kumar's Basic Banking System</title>
    <?php require_once "bootstrap.php"; ?>
    
</head>
<body>
<div class="container">

<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        
        <div class="container">
            <a class="navbar-brand mr-auto" href="./index.php">
                <img src="./imgs/logo.png" height="40" width="51">
            </a>

            <button class="navbar-toggler navbar-toggler-right justify-content-end" type="button" data-toggle = "collapse" data-target = "#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="Navbar">
                <ul class="navbar-nav">
                   
                    <li class="nav-items"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-items"><a class="nav-link" href="./transfer.php"><span class="fa fa-info fa-lg"></span> Transfer Money</a></li>
                    <li class="nav-items"><a class="nav-link" href="./transaction.php"><span class="fa fa-info fa-lg"></span> Transaction</a></li>
                    <li class="nav-items  active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> All Customers</a></li>
                   
                </ul>                
            </div>
        </div>
    </nav>

    <h2 id="headtxt">Basic Banking System</h2>    

    <?php
      echo "<div class='table-responsive'>";
      echo "<table class='table table-sm text-center table-bordered table-hover'>";
      echo "<tr><thead>";
      echo "<th>Id</th>";
      echo "<th>Name</th>";
      echo "<th>Email</th>";
      echo "<th>Amount</th>";
      echo "<th>Details</th>";
      echo "</thead></tr>";
      echo "<tbody>";
      foreach ($rows as $row){
        echo "<tr>";
        echo ("<td>".$row['uid']."</td>");        
        echo ('<td>'.$row['Name']."</td>");
        echo ("<td>".$row['email']."</td>");
        echo ("<td>".$row['Balance']."</td>");
        echo ('<td><a class= "btn btn-sm btn-primary" href="transfer.php?uid='.$row['uid'].'">Transact</a></td>');        
        echo "</tr>";
      }
      echo "</tbody></table>";
      echo "</div>";
     ?>

</div>

        <footer class="footer fixed-bottom bg-primary ">
            <div class="row justify-content-center my-3 mb-0 text-white"> <span>&#169;</span> 2021 Copyright:&nbsp;
                <a href="https://www.linkedin.com/in/rajesh-kumar2024/" class="text-warning"> Rajesh Kumar</a>
            </div>
        </footer>

</body>
</html>
