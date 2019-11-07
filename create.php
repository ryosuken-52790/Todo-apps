


<?php

// ◎そもそもコレは何をするためのコード？？
// require_once('Models/Todo.php');
require_once('Models/Todo.php');


// 入力されたデータを変数taskに保存
// これは、indexにある、設定した'name=task'をスーパーG関数として挿入する。
$task = $_POST['task'];


$todo = new Todo();
// ここでやりたいことはtaskに格納されたデータを受け取ってDBに入れたい。

// インスタンス化したcreateメソッドを呼び出したい。
// アロー演算子->は、変数・関数どっちでも使える。

// Todoという実体を、newでつくったよ♪



// $todo->create($task);
// ここで機能してない。
// 新しいtaskを作成
$latestId = $todo->create($task);



// header('Location: index.php');
// 2019.11/05
// ajaxを使ってるから、機能していない。


// 最新のタスクを取得
$latestTask = $todo->get($latestId);

// 最新のタスクをjson形式で通信もとに返すよ
echo json_encode($latestTask);
