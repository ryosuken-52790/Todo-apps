<?php

// require_once('Models/Todo.php');
require_once('Models/Todo.php');
// 入力されたデータを変数taskに保存
$task = $_POST['task'];

$todo = new Todo();
// ここでやりたいことはtaskに格納されたデータを受け取ってDBに入れたい。
// インスタンス化したcreateメソッドを呼び出したい。
// アロー演算子->は、変数・関数どっちでも使える。

$todo->create($task);
// ここで機能してない。


header('Location: index.php');