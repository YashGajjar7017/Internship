<?php
require_once "Navbar/nav.php";
require_once "Database/Connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tid = $_POST['utid'];
    $tname = $_POST['tname'];
    $tdesc = $_POST['tdesc'];
    $tsdate = $_POST['tsdate'];
    $tedate = $_POST['tedate'];

    $sql = "SELECT * FROM `taskInfo` WHERE t_id = '$tid'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        $sql = "UPDATE `taskinfo` SET `t_id`='$tid',`task_title`='$tname',`task_desc`='$tdesc',`tsdate`='$tsdate',`tedate`='$tedate' WHERE `t_id` = '$tid';";
        $result = mysqli_query($con, $sql);

        echo "
        <html>
            <body>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success </strong> Your task information is updated.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </body>
        </html>";
    } else {
        echo "
        <html>
            <body>
                 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     <strong>Warning </strong> Your task id is doesn't exist.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </body>
        </html>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="CSSs/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background-color: #333;color:#fff;">
    <div class="main" style="border:2px dotted white;margin-left:25%;margin-right:27%;border-radius:10px;">
        <div class="head t-a-center"  style="margin-top:.5vh;">
            <h1>New Update's</h1>
        </div>
        <section class="container">
            <form class="mform" action="./3_Update.php" method="post">
                <div class="">
                    <input type="number" min="0" max="1000" class="form-control" name="utid" required placeholder="Enter task id">
                </div>
                <div class="">
                    <input type="text" class="form-control" name="tname" required placeholder="Enter task title">
                </div>
                <div class="">
                    <input type="text" class="form-control" name="tdesc" required placeholder="Enter task discription...">
                </div>
                <div class="">
                    <label for="tsdate" class="form-label">Task Start-Date</label>
                    <input type="datetime-local" class="form-control" name="tsdate" required placeholder="Enter start-date">
                </div>
                <div class="">
                    <label for="tedate" class="form-label">Task End-Date</label>
                    <input type="datetime-local" class="form-control" name="tedate" required placeholder="Enter end-date">
                </div>
                <div class="t-a-center">
                    <input class="btn btn-dark" type="reset" value="Reset" style="padding:10px;border:1px dotted white;">
                    <input class="btn btn-primary" type="submit" value="Submit" style="padding:10px;border:1px dotted white;">
                </div>
            </form>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>