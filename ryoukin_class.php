<?php
//require_once("ryoukin.php");

class Ryoukin
{

    public $course;
    public $outtime;
    public $intime;
    public $intimenight;
    public $outtimenight;

    public function __construct($course, $outtime, $intime, $intimenight, $outtimenight)
    {
        $this->course = $course;
        $this->outtime = $outtime;
        $this->intime = $intime;
        $this->intimenight = $intimenight;
        $this->outtimenight = $outtimenight;
    }

    public function get()
    {
        //通常料金の計算
        if ($this->course == 500) {
            //入店と退店の時間から差を計算(秒)
            $timecul = $this->outtime->getTimestamp() - $this->intime->getTimestamp();
            //合計時間が1時間以内なら
            if ($timecul <= 3600) {
                //時間を数値に型変換
                $timecul = intval($timecul);
                //時間を分に型変換
                $timecul = ceil($timecul / 60);

                //料金の計算（税込）
                $timeculretax = $this->course * 1.08;

                print "合計時間：" . $timecul . "分<br />";
                print "税抜価格：" . $this->course . "円<br />";
                print "お支払い合計：" . $timeculretax . "円(税込)";
                //一時間以上なら10分ごとに延長
            } else {
                $timeculamount = $this->intime->diff($this->outtime)->format("%h時%i分%s");

                //時間を数値に型変換
                $timecul = intval($timecul);

                //10分ごとの延長料金の計算（税抜き）
                //１時間マイナス
                $timeculre = floor(($timecul - 3600) / 600);

                //深夜時間だったら
                if (
                    22 <= $this->intimenight && $this->intimenight <= 23 || 0 <= $this->intimenight && $this->intimenight <= 5
                    || 22 <= $this->outtimenight && $this->outtimenight <= 23 || 0 <= $this->outtimenight && $this->outtimenight <= 5
                ) {
                    //延長料金は深夜割増
                    $timeculre = $timeculre * 100 * 1.15;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                } else {
                    //10分ごとの延長料金の計算（税抜き）
                    $timeculre = $timeculre * 100;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                }
            }
        }
        //3時間パック料金の計算
        if ($this->course == 800) {
            //入店と退店の時間から差を計算(秒)
            $timecul = $this->outtime->getTimestamp() - $this->intime->getTimestamp();

            //合計時間が3時間以内なら
            if ($timecul <= 10800) {
                //時間を数値に型変換
                $timecul = intval($timecul);

                //時間を分に型変換
                $timecul = ceil($timecul / 60);

                //料金の計算（税込）
                $timeculretax = $this->course * 1.08;

                print "合計時間：" . $timecul . "分<br />";
                print "税抜価格：" . $this->course . "円<br />";
                print "お支払い合計：" . $timeculretax . "円(税込)";

                //3時間以上なら10分ごとに延長
            } else {
                $timeculamount = $this->intime->diff($this->outtime)->format("%h時%i分%s");

                //時間を数値に型変換
                $timecul = intval($timecul);

                //10分ごとの延長料金の計算（税抜き）
                //3時間マイナス
                $timeculre = floor(($timecul - 10800) / 600);

                //深夜時間だったら
                if (
                    22 <= $this->intimenight && $this->intimenight <= 23 || 0 <= $this->intimenight && $this->intimenight <= 5
                    || 22 <= $this->outtimenight && $this->outtimenight <= 23 || 0 <= $this->outtimenight && $this->outtimenight <= 5
                ) {
                    //延長料金は深夜割増
                    $timeculre = $timeculre * 100 * 1.15;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                } else {
                    //10分ごとの延長料金の計算（税抜き）
                    $timeculre = $timeculre * 100;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                }
            }
        }
        //5時間パック料金の計算
        if ($this->course == 1500) {
            //入店と退店の時間から差を計算(秒)
            $timecul = $this->outtime->getTimestamp() - $this->intime->getTimestamp();
            //合計時間が5時間以内なら
            if ($timecul <= 18000) {
                //時間を数値に型変換
                $timecul = intval($timecul);

                //時間を分に型変換
                $timecul = ceil($timecul / 60);

                //料金の計算（税込）
                $timeculretax = $this->course * 1.08;

                print "合計時間：" . $timecul . "分<br />";
                print "税抜価格：" . $this->course . "円<br />";
                print "お支払い合計：" . $timeculretax . "円(税込)";

                //5時間以上なら10分ごとに延長
            } else {
                $timeculamount = $this->intime->diff($this->outtime)->format("%h時%i分%s");

                //時間を数値に型変換
                $timecul = intval($timecul);

                //10分ごとの延長料金の計算（税抜き）
                //5時間マイナス
                $timeculre = floor(($timecul - 18000) / 600);

                //深夜時間だったら
                if (
                    22 <= $this->intimenight && $this->intimenight <= 23 || 0 <= $this->intimenight && $this->intimenight <= 5
                    || 22 <= $this->outtimenight && $this->outtimenight <= 23 || 0 <= $this->outtimenight && $this->outtimenight <= 5
                ) {
                    //延長料金は深夜割増
                    $timeculre = $timeculre * 100 * 1.15;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                } else {
                    //10分ごとの延長料金の計算（税抜き）
                    $timeculre = $timeculre * 100;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                }
            }
        }
        //8時間パック料金の計算
        if ($this->course == 1900) {
            //入店と退店の時間から差を計算(秒)
            $timecul = $this->outtime->getTimestamp() - $this->intime->getTimestamp();
            //合計時間が8時間以内なら
            if ($timecul <= 28800) {
                //時間を数値に型変換
                $timecul = intval($timecul);

                //時間を分に型変換
                $timecul = ceil($timecul / 60);

                //料金の計算（税込）
                $timeculretax = $this->course * 1.08;

                print "合計時間：" . $timecul . "分<br />";
                print "税抜価格：" . $this->course . "円<br />";
                print "お支払い合計：" . $timeculretax . "円(税込)";

                //一時間以上なら10分ごとに延長
            } else {
                $timeculamount = $this->intime->diff($this->outtime)->format("%h時%i分%s");

                //時間を数値に型変換
                $timecul = intval($timecul);

                //10分ごとの延長料金の計算（税抜き）
                //8時間マイナス
                $timeculre = floor(($timecul - 28800) / 600);

                //深夜時間だったら
                if (
                    22 <= $this->intimenight && $this->intimenight <= 23 || 0 <= $this->intimenight && $this->intimenight <= 5
                    || 22 <= $this->outtimenight && $this->outtimenight <= 23 || 0 <= $this->outtimenight && $this->outtimenight <= 5
                ) {
                    //延長料金は深夜割増
                    $timeculre = $timeculre * 100 * 1.15;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                } else {
                    //10分ごとの延長料金の計算（税抜き）
                    $timeculre = $timeculre * 100;
                    $timeculre = $timeculre + $this->course;

                    //料金の計算（税込）
                    $timeculretax = floor($timeculre * 1.08);

                    print "合計時間：" . $timeculamount . "秒<br />";
                    print "税抜価格：" . $timeculre . "円<br />";
                    print "お支払い合計：" . $timeculretax . "円(税込)";
                }
            }
        }
    }
}
