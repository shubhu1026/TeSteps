<?php
session_start();
$answerCheck = $_POST['Answer'];
$refCheck = $_SESSION['$ans'];

$url = "https://api.dandelion.eu/datatxt/sim/v1/?text1=" . urlencode($answerCheck) . "&text2=" . urlencode($refCheck) . "&lng=en&token=abd20d0cee994d3eb9107df466de620a";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

$responseArray = json_decode(curl_exec($curl), true);
curl_close($curl)
?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="test.css">
</head>
<body>
    <h1><span>TeSteps.</span></h1>
    <div class="result-container">
        <div class="result">
            <h1><center>Your Score <br><?php echo ($responseArray["similarity"]*100);?>%</center><h1>
        </div>

        <div class="test-buttons">
            <div class="next-question">
                <a href="test.php">Try Next</a>
            </div>

            <div class="stop">
                <a href="../index.php">Go to Home Page</a>
            </div>
        </div>
    </div>
</body>
</html>