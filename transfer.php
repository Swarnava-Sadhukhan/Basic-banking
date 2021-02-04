
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
        <div class="col-sm-8 offset-md-2" style="width:200px;height:450px;background:#297bff;border-radius:25px;text-align:center;">
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
            $i=$j;
        ?>
            <h1 style="padding-top:10px;">Transfer money with a single click.</h1>
            <div style="text-align:left;padding-top:50px;padding-left:50px;">
                <form action="" method ="post">
                    <label style="padding-bottom:20px;padding-right:20px;"><h2>Choose sender account:  </h2></label>
                    <select id="sender" name="sender" style="padding-left:20px;">
                    <?php
                        for($i=1;$i<=$j;$i++)
                        {
                    ?>
                        <option value=<?php echo $names[$i]?>><?php echo $names[$i] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <br>
                    <label style="padding-bottom:20px;padding-right:20px;"><h2>Choose receiver account: </h2></label>
                    <select id="receiver" name="receiver" style="padding-left:20px;">
                    <?php
                        for($i=1;$i<=$j;$i++)
                        {
                    ?>
                        <option value=<?php echo $names[$i]?> ><?php echo $names[$i] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <br>
                    <label style="padding-bottom:20px;padding-right:20px;"><h2>Enter amount:  </h2></label>
                    <input type="number" min="1" name="amount">
                    <br>
                    <input type= "submit" value="Transfer" name="submit" style="padding-bottom:10px;padding-right:20px;padding-left:20px;margin-left:200px;background:#cf3113;border-radius:5px;">
                    <!--<button type="button" class="btn btn-success" style="padding-bottom:10px;padding-left:20px;margin-left:200px;"><b>Transfer</b></button>-->
                </form>
                <?php
                if(isset($_POST['submit']))
                {
                    if($_POST['sender']==$_POST['receiver'])
                    {
                        echo "Sender and Receiver cannot be the same.";
                    }
                    else
                    {
                        $query=mysqli_query($con,"select * from user where name='".$_POST['sender']."'");
                        $n=mysqli_fetch_array($query);
                        if((int)$n['balance']<(int)$_POST['amount'])
                        {
                            echo "Insufficient Balance";
                        }
                        else
                        {
                            $sql1="Update user set balance=balance-".$_POST['amount']." where name='".$_POST['sender']."'";
                            $sql2="Update user set balance=balance+".$_POST['amount']." where name='".$_POST['receiver']."'";
                            if (!mysqli_query($con, $sql1))
                                echo "Sender not updated";
                            if(!mysqli_query($con, $sql2))
                                echo "Receiver not updated";
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('Y-m-d h:i:s', time());
                            for($z1=1;$z1<=$j;$z1++)
                            {
                                if($names[$z1]==$_POST['sender'])
                                    break;
                            }
                            for($z2=1;$z2<=$j;$z2++)
                            {
                                if($names[$z2]==$_POST['receiver'])
                                    break;
                            }
                            $sql3="Insert into transaction(sender,receiver,amount,t_date) values ('".$z1."','".$z2."','".$_POST['amount']."','".$date."')";
                            if (!mysqli_query($con, $sql3))
                                echo "Transaction not updated\n";
                            else
                                echo '<script>
                                    alert("Transaction Successful. You will be redirected to the home page.");
                                    window.location.href="index.html";
                                </script>';
                        }
                    }
                }
                ?>
            </div>  
        </div>
    </div>
</body>
</html>