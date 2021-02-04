
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>TSF Bank</title>
</head>
<body>
    <div class="jumbotron jumbotron-fluid" style="background-color:#297bff;">
        <div class="container" style="padding-left:200px;">
          <h1>The Sparks Foundation Bank <i class="fa fa-bank" style="color:black;"></i></h1>
          <h4>The Bank for anyone and everyone.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-md-2" style="width:200px;height:400px;background:#297bff;border-radius:25px;text-align:center;">
        <table class="table table-hover" style="overflow:scroll;table-layout:fixed;max-height:100%;">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Contact no.</th>
                    <th>Email ID</th>
                    <th>Current Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    ob_start();
                    session_start();
                    $i=0;
                    include ('connect.php');
                    $res=mysqli_query($con,"select * from user"); 
                    while ($data = mysqli_fetch_array($res)) 
                    {
                        $i++;
                ?>
                <tr>
                    <td id="tr"> <?php echo $data['id']; ?></td>
                    <td id="tr"> <?php echo $data['name']; ?></td>
                    <td id="tr"> <?php echo $data['phone']; ?></td>
                    <td id="tr"> <?php echo $data['email']; ?></td>
                    <td id="tr"> <?php echo $data['balance']; ?></td>
                </tr>
            </tbody>
            <?php
                    }
            ?>
        </table>

        </div>
    </div>
</body>
</html>