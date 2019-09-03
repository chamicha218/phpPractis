
<?php
// エレベーターが止まった階数を入力。エレベーターが何階分移動したかを出力
// 地下一階は－１と表記する。－１から１の移動は１階分とカウント。

$stopFloor = [1, -3, -1, 2, 1];
$differenceFloor = 0;
$totalVal = 0;

// 入力された個数が違っても、対応するためにループ終了条件を動的にする
$stopFloorCount = count($stopFloor);
$loopCount = $stopFloorCount - 1;

for ($i = 0; $i < $loopCount; $i++) {
    $differenceFloor = $stopFloor[$i] - $stopFloor[$i + 1];
    // もし、引き算する要素の片方だけが負の数で、
    if (($stopFloor[$i] < 0 && $stopFloor[$i + 1] > 0) || ($stopFloor[$i] > 0 && $stopFloor[$i + 1] < 0)) {
        // 引き算した結果がマイナスであれば、結果にプラス１した分の絶対値が移動階数分になる
        if ($differenceFloor < 0) {
            $differenceFloor = ($differenceFloor + 1);
            $totalVal = abs($differenceFloor) + $totalVal;
        } else {
            // 引き算の結果がプラスであれば、結果にマイナス１した分の絶対値が移動階数分になる
            $differenceFloor = ($differenceFloor - 1);
            $totalVal = abs($differenceFloor) + $totalVal;
        }
    } else {
        // 引き算する要素の符号が二つとも同じ場合は、引き算した結果の絶対値が移動階数分になる
        $totalVal = abs($differenceFloor) + $totalVal;
    }
}
echo $totalVal;
