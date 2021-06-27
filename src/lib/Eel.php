<?php

//①入力処理：値取得、テーブル座席の配列準備
$nmArray = explode(" ", fgets(STDIN));
//print_r($nm_array);

$seatNum = $nmArray[0];
$groupNum = $nmArray[1];

echo "シート数：" . $seatNum . PHP_EOL;
echo "グループ数：" . $groupNum . PHP_EOL;

$seat = array();
$seat = array_pad($seat, $seatNum, 0);

//②グループごとに空席確認
//グループ分のループ
$count = 0;
for ($i = 0; $i < $groupNum; $i++) {
    $groupArray = explode(" ", fgets(STDIN));
    $groupPersonNum = $groupArray[0];
    $sitAt = $groupArray[1];
    $sitAt -= 1;
    echo "グループの人数：" . $groupPersonNum . PHP_EOL;
    echo "着席開始位置：" . $sitAt . PHP_EOL;

    //グループの人数分のループ、空席確認
    $emptyFlg = true; //trueは座れる
    for ($j = $sitAt; $j < $sitAt + $groupPersonNum; $j++) {
        //円卓処理
        if ($j >= $seatNum) {
            $searchPoint = $j - $seatNum;
        } else {
            $searchPoint = $j;
        }
        //$searchPoint = $j;
        if ($seat[$searchPoint] > 0) {
            $emptyFlg = false;
            break;
        }
    }

    //③席が空いていたら座る処理
    if ($emptyFlg == true) {
        //グループの人数分のループ、着席処理
        //円卓処理
        for ($j = $sitAt; $j < $sitAt + $groupPersonNum; $j++) {
            //円卓処理
            if ($j >= $seatNum) {
                $searchPoint = $j - $seatNum;
            } else {
                $searchPoint = $j;
            }
            $seat[$searchPoint] = 1;
            $count += 1;
        }
    }
}


//④出力処理：座った人の人数を出力
echo $count;
