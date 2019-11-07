<?php

// Todo.phpを読み込む。
require_once 'Models/Todo.php';

// タスクを完了させる
// deleteと似てる。
// 完了ボタンがクリックされた時のタスクidを取得

  $id = ＄_GET['id'];


  // Todoクラスをインスタンス化（設計図から実体をつくる）
  $todo = new Todo();

  // doneメソッドを実行
  $todo->done($id);


  // 更新したタスクのIDをjsonにして返す
  echo json_encode($id);




  
  // この状態だと、ajaxを通していなくて、・・・・・・？


