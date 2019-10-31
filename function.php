<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// h関数の意味とは？
// h単体に意味はない。やだそう決めているだけ！
// htmlspecialcharsが無害化をしてくれるツールで、そこを通して
// returnしますよ〜  htmlに。それだけ。まだその時点では機能していない。
