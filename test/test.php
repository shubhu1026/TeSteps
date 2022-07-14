<?php
    include_once 'db.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="test.css">
    <title>Auto Checker</title>
</head>
<body>
    <?php 

    $i=0;
    while($i<1) { 
        $random= mt_rand(1 , 8);
        $sql = "SELECT * FROM queans WHERE sno = '$random'  LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        if($result) {
            while($row = mysqli_fetch_assoc($result)){
            $question = $row['question'];
            $answer = $row['answer'];
            $_SESSION['$ans'] = $answer;
            }
        }
    ?>

    <h1><span>TeSteps.</span></h1> 
        <div class="que-contain-box">
            <form method="post" action="check.php">
                <div class="ques-box">
                    <h1>Q. <?php echo $question ?></h1>
                </div>
                <div class="ans-box">
                    <input type="text" name="Answer" placeholder = "Type your answer here.....">
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>

    <?php
        $i++;
    }
    ?>
</body>
</html>