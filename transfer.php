<?php
   
    require_once "pdo.php";
    session_start();

    
    
    if(isset($_POST['payee']) && isset($_POST['recipient']) && isset($_POST['amount'])){
        $sqlstmt = $pdo->query('SELECT * FROM customer WHERE uid = '.$_POST['payee']);
        $sqldata = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        $payeeName = "";
        $payeeBal = 0;
        foreach($sqldata as $data){
            $payeeName = $data['Name'];
            $payeeBal = $data['Balance'];
        }
        if ($payeeBal >= $_POST['amount']){
        $payeeFinal = $payeeBal-$_POST['amount'];
        

        $sqlstmt2 = $pdo->query('SELECT * FROM customer WHERE uid = '.$_POST['recipient']);
        $sqldata2 = $sqlstmt2->fetchAll(PDO::FETCH_ASSOC);
        $recName = "";
        $recBal = 0;
        foreach($sqldata2 as $data2){
            $recName = $data2['Name'];
            $recBal = $data2['Balance'];
        }
        $recFinal = $recBal + $_POST['amount'];
        
        

        $sql = $pdo->prepare('INSERT INTO transaction (Payee, Receipient,Amount) VALUES ( :payee,:recipient,:amount)');
        $sql->execute(array(
            ':payee' => $payeeName,
            ':recipient' => $recName,
            ':amount' => $_POST['amount'])
        );



        $sql3 = $pdo->query("UPDATE customer SET Balance = '$payeeFinal' WHERE uid = ".$_POST['payee']);
        $sql4 = $pdo->query("UPDATE customer SET Balance = '$recFinal' WHERE uid = ".$_POST['recipient']);
        

    $_SESSION['success'] = "Transfer Successful.";
    header('Location: ./transaction.php');
    return;
        }
        else{
            $_SESSION['error'] = "Insufficient Balance!";
            header('Location: ./transaction.php');
        }
    }
    
    $id = 0;
    if (isset($_GET['uid'])){
        $id = $_GET['uid'];
    }   
    $stmt = $pdo->query("SELECT * from customer");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($id != 0){
        $stmt2 = $pdo->query("SELECT * from customer where uid = ".$id);
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }

    else{
        $stmt2 = $pdo->query("SELECT * from customer");
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    

    


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
                    <li class="nav-items active"><a class="nav-link" href="#"><span class="fa fa-info fa-lg"></span> Transfer Money</a></li>
                    <li class="nav-items"><a class="nav-link" href="./transaction.php"><span class="fa fa-info fa-lg"></span> Transaction</a></li>
                    <li class="nav-items"><a class="nav-link" href="./customers.php"><span class="fa fa-address-card fa-lg"></span> All Customers</a></li>
                   
                </ul>                
            </div>
        </div>
    </nav>

        <h2 id="headtxt">Transfer Money</h2>
        
        <div class="container text-center">
        <form class= "col col-md" action="transfer.php" name = "form1" method="post">
            
        <div class="form-row">
                <div class = "form-group form-grp">
                    <label for="recipient">Transfer From </label>
                    <select class = "form-control form-control-sm mr-1" name = "payee">                        
                        <?php 
                            if ($id == 0){
                                echo "<option disabled selected>-- Select Customer --</option>";
                            }
                            foreach ($rows2 as $user){
                                echo "<option value='". $user['uid'] ."'>" .$user['Name'] ."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            


            <div class="form-row">
                <div class = "form-group form-grp">
                    <label for="recipient">Transfer To </label>
                    <select class = "form-control form-control-sm mr-1" name = "recipient">
                        <option disabled selected>-- Select Customer --</option>
                        <?php 
                            foreach ($rows as $row){
                                echo "<option value='". $row['uid'] ."'>" .$row['Name'] ."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class = "form-group form-grp">
                    <div class="inputfield">
                        <label for="recipient">Amount </label>
                        <input type= "number" min= "0" max = "100000" class= "form-control form-control-sm mr-1" name = "amount">
                    </div>
                </div>
            </div>
            
            

            <div class="text-center">
                <button type="submit" class="btn btn-success btn-md">Transfer</button>        
            </div>
        </form>
        </div>


</div>

<footer class="footer fixed-bottom bg-primary ">
    <div class="row justify-content-center my-3 mb-0 text-white"> <span>&#169;</span> 2021 Copyright:&nbsp;
        <a href="https://www.linkedin.com/in/rajesh-kumar2024/" class="text-warning"> Rajesh Kumar</a>
    </div>
</footer>


</body>
</html>
