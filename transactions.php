
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
        <div class="col-sm-8 offset-md-2" style="width:200px;height:100%;background:#297bff;border-radius:25px;text-align:center;">
        <table class="table table-hover" style="overflow:scroll;table-layout:fixed;max-height:100%;">
            <thead>
                <tr>
                    <th>Sender Name</th>
                    <th>Receiver Name</th>
                    <th>Amount</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    ob_start();
                    session_start();
                    $i=0;
                    include ('connect.php');
                    $query=mysqli_query($con,"select * from user");
                    $names=array("");
                    $j=0;
                    while($n=mysqli_fetch_array($query))
                    {
                        $j++;
                        $names[$j]=$n['name'];
                    }
                    $res=mysqli_query($con,"select * from transaction"); 
                    while ($data = mysqli_fetch_array($res)) 
                    {
                        $i++;
                ?>
                <tr>
                    <td id="tr"> <?php echo $names[(int)$data['sender']]; ?></td>
                    <td id="tr"> <?php echo $names[(int)$data['receiver']]; ?></td>
                    <td id="tr"> <?php echo $data['amount']; ?></td>
                    <td id="tr"> <?php echo $data['t_date']; ?></td>
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
