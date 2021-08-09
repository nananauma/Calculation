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
        <h4>入店日時</h4>
        <input type="text" name="instore" value="<?php print $date->format("Y-m-d H:i:s"); ?>"><br />
        <!--<input type="radio" name="instore" value="<?php echo date('Y/m/d H:i:s'); ?>">
        <label for="contactChoice1"><?php echo date('Y/m/d H:i:s'); ?></label><br />-->
        <select name="course">
            <option value="500">通常料金（入室から1時間）	500円(税抜)</option>
            <option value="800">3時間パック（入室から3時間）	800円(税抜)</option>
            <option value="1500">5時間パック（入室から5時間）	1500円(税抜)</option>
            <option value="1900">8時間パック（入室から8時間）	1900円(税抜)</option>
        </select>
        <h4>※延長10分ごとに	100円かかります。延長料金は深夜（22:00〜翌朝5:00まで）については15%割増となります</h4>
        <input type="submit" value="確定" />
    </form>
</body>

</html>