<?php

require_once "pdo.php";
session_start();

$stmt = $pdo->query("SELECT * from transaction");
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
                    <li class="nav-items active"><a class="nav-link" href="#"><span class="fa fa-info fa-lg"></span> Transaction</a></li>
                    <li class="nav-items"><a class="nav-link" href="./customers.php"><span class="fa fa-address-card fa-lg"></span> All Customers</a></li>
                   
                </ul>                
            </div>
        </div>
    </nav>

    <?php 
        if (isset($_SESSION['success'])) {
            echo('<p style="color: green; padding-top:40px; font-size: -webkit-large;" >' . htmlentities($_SESSION['success']) . "</p>\n");
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['error'])) {
            echo('<p style="color: red; padding-top:40px; font-size: -webkit-large;" >' . htmlentities($_SESSION['error']) . "</p>\n");
            unset($_SESSION['error']);
        }
    ?>

<h2 id="headtxt">Transactions</h2>

    <?php
        if(sizeof($rows) > 0){
            echo "<div class='table-responsive'>";
            echo "<table class='table table-sm text-center table-bordered table-hover'>";
            echo "<tr><thead>";
            echo "<th>Id</th>";
            echo "<th>From</th>";
            echo "<th>To</th>";
            echo "<th>Amount</th>";
            echo "</thead></tr>";
            echo "<tbody>";
            foreach ($rows as $row){
                echo "<tr>";
                echo ("<td>".$row['pid']."</td>");
                echo ("<td>".$row['Payee']."</td>");
                echo ("<td>".$row['Receipient']."</td>");
                echo ("<td>".$row['Amount']."</td>");
                
                echo "</tr>";
            }
            echo "</tbody></table>";
            echo "</div>";
        }
        else{
            echo '<p style="color: red; padding-top:40px; font-size: -webkit-large;" >No Transactions Yet!!</p>';
        }
     ?>

</div>

<footer class="footer fixed-bottom bg-primary ">
    <div class="row justify-content-center my-3 mb-0 text-white"> <span>&#169;</span> 2021 Copyright:&nbsp;
        <a href="https://www.linkedin.com/in/rajesh-kumar2024/" class="text-warning"> Rajesh Kumar</a>
    </div>
</footer>


</body>
</html>
