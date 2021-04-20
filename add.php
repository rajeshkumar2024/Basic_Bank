<?php 
    
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

            <a class="navbar-brand mr-auto" href="#">
                <img src="./imgs/logo.png" height="40" width="51">
            </a>
            <button class="navbar-toggler navbar-toggler-right justify-content-end" type="button" data-toggle = "collapse" data-target = "#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="Navbar">
                <ul class="navbar-nav">
                   
                    <li class="nav-items active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-items"><a class="nav-link" href="./transfer.php"><span class="fa fa-info fa-lg"></span> Transfer Money</a></li>
                    <li class="nav-items"><a class="nav-link" href="./transaction.php"><span class="fa fa-info fa-lg"></span> Transaction</a></li>
                    <li class="nav-items"><a class="nav-link" href="./customers.php"><span class="fa fa-address-card fa-lg"></span> All Customers</a></li>
                   
                </ul>                
            </div>
        </div>
    </nav> 

    <h2 id="headtxt">Basic Banking System</h2>
    <div class="container text-center my-5">
        <div class="card d-inline-block mr-md-5 my-5" style="width: 18rem;">
            <img class="card-img-top" src="./imgs/customers_logo.png" alt="Customer Logo">
            <div class="card-body text-center">                
                <a href="./customers.php" class="btn btn-primary">All Customers</a>
            </div>
        </div>

        <div class="card d-inline-block mr-md-5 my-5" style="width: 18rem;">
            <img class="card-img-top" src="./imgs/transfer_logo.jpg" alt="Transfer Logo">
            <div class="card-body text-center">                
                <a href="./transfer.php" class="btn btn-primary">Money Transfer</a>
            </div>
        </div>
        <div class="card d-inline-block mr-md-5 my-5" style="width: 18rem;">
            <img class="card-img-top" src="./imgs/transaction_logo.png" alt="Transactions Logo">
            <div class="card-body text-center">                
                <a href="./transaction.php" class="btn btn-primary">All Transactions</a>
            </div>
        </div>
    </div>
    

</div>

<footer class="footer fixed-bottom bg-primary ">
    <div class="row justify-content-center my-3 mb-0 text-white"> <span>&#169;</span> 2021 Copyright:&nbsp;
        <a href="https://www.linkedin.com/in/rajesh-kumar2024/" class="text-warning"> Rajesh Kumar</a>
    </div>
</footer>

</body>
</html>