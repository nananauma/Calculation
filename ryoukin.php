<?php
session_start();

require_once("ryoukin_class.php");

if(isset($_POST['instore'])){
    //時間計算のため
    $intime = new DateTimeImmutable($_POST['instore'], new DateTimeZone("Asia/Tokyo"));
    $intime->format("Y-m-d H:i:s");
    //深夜時間判定のため
    $intimenight = $intime->format("H");
    $intimenight = intval($intimenight);

    //セッションに入店時間を保存
    $_SESSION['intime'] = $intime;

    //セッションに深夜入店時間を保存
    $_SESSION['intimenight'] = $intimenight;

    //セッションに選択コースを保存
    $_SESSION['course'] = $_POST['course'];

    header('Location: ryoukin_outform.php');

//退店時間が入力されたら
}else{
    $outtime = new DateTimeImmutable($_POST['outstore'], new DateTimeZone("Asia/Tokyo"));
    $outtime->format("Y-m-d H:i:s");

    //深夜時間判定のため
    $outtimenight = $outtime->format("H");
    //深夜時間判定のため
    $outtimenight = intval($outtimenight);

    //深夜入店時間をセッションから変数へ
    $intimenight = $_SESSION['intimenight'];

    //入店時間をセッションから変数へ
    $intime = $_SESSION['intime'];

    //コース料金をセッションから変数へ
    $course = $_SESSION['course'];

    //ryoukinインスタンス化
    $one = new Ryoukin($course,$outtime,$intime,$intimenight,$outtimenight);

    //計算実行
    //$result = $one->get($outtimenight,$intimenight,$outtime,$intime,$course);
    $result = $one->get();
    echo $result;

}
?>