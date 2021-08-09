<?php
$date = new DateTimeImmutable(NULL, new DateTimeZone("Asia/Tokyo"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remtest</title>
</head>
<body>
<form action="/ryoukin.php" method="POST">
<h4>退店日時</h4>
<input type="text" name="outstore" value="<?php print $date->format("Y-m-d H:i:s") ?>"><br />

<!--<input type="datetime-local" name="outstore" step="1"><br />-->
<input type="submit" value="送信" />
</form>
</body>
</html>