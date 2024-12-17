<!-- 【中級】採用試験問題、課題１ -->
<!-- 鉱石調査：覚えるべき特徴数の最小値を求める -->

<?php

function readInput() {
    $firstLine = trim(fgets(STDIN));
    $firstLineArr = explode(" ", $firstLine);
    $oreQuantity = (int)$firstLineArr[0]; // 鉱石種類の数

    // 1行目以降の入力(各特徴への答え)は不必要のため、入力できるようにはしておき、その後に破棄：
    for ($i=0; $i < $oreQuantity; $i++) {
        fgets(STDIN);
    }

    echo findMinimumTraits($oreQuantity);
    echo "\n";
}

function findMinimumTraits($oreQuantity) {
    // 特徴数の最小値（の初期値）
    $minTraits = 0;

    // 覚えるべき特徴数の最小値をさがす
    while ((1 << $minTraits) < $oreQuantity) { 
        $minTraits++;
    }
    /*
    上記のwhile文について：
    (1 << $minTraits)： 数字「１」の2進数表現を、$minTraits回 左へシフトする。
    例：
        $oreQuantity = 3の場合、
        １ループ目：「１」の2進数表現を $minTraits回（０回）左にシフトする。結果：１（0001）
        ２ループ目：「１」の2進数表現を $minTraits回（１回）左にシフトする。結果：２（0010）
        ３ループ目：「１」の2進数表現を $minTraits回（２回）左にシフトする。結果：４（0100）
        ４ループ目：「１」の2進数表現を $minTraits回（３回）左にシフトする。結果：８（1000）-> 条件不成立につき、ループを抜ける。
        結果：$minTraits = 4
        （3種の特徴があれば、8種の鉱石を区別できる -> 足りない）
        （4種の特徴があれば、16種の鉱石を区別できる -> 足りる）
    */

    // 覚えるべき特徴数の最小値を返す
    return $minTraits;
}

readInput();

?>
