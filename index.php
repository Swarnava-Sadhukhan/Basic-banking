<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>TSF Bank</title>
</head>
<body style="background-color: #b3edfc;">
    <div class="jumbotron jumbotron-fluid" style="background-color:#297bff;">
        <div class="container" style="padding-left:200px;">
          <h1>The Sparks Foundation Bank <i class="fa fa-bank" style="color:black;"></i></h1>
          <h4>The Bank for anyone and everyone.</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3 offset-md-1" style="width:100px;height:300px;background:#297bff;border-radius:25px;text-align: center;">
                <h2 style="padding-top:10px;"><u>About Us</u></h2>
                <p>
                    <h4>
                    This is a bank prototype created as a part of an assignment of The Sparks Foundation Project.<br>
                    This has a demo database of a few users with some account balance which can be transferred between them.
                    </h4>
                </p>
        </div>
        <div class="col-sm-4 offset-md-1" style="padding-top:30px;width:200px;height:300px;background:#297bff;border-radius:25px;text-align:center;">
            <h2><u>Welcome to TSF Bank</u></h2><br>
            <h3>View our customers <a href="view.php"><button type="button" class="btn btn-success">View</button></a></h3></h3>
            <h3>View our transactions <a href="transactions.php"><button type="button" class="btn btn-success">View</button></a></h3></h3>
            <h3>Transfer money <a href="transfer.php"><button type="button" class="btn btn-success">Transfer</button></a></h3>
        </div>
    </div>
</body>
</html>
