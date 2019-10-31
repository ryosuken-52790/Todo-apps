<?php

require_once('Models/Todo.php');


// task, id を取得するコードを書いてください。
// スーパーグローバル関数を使って。

// 確認方法はvar_dumpを使って


$id = $_POST['id'];
$id = $_POST['task'];

// 指定してあげて、var_dump!!
      // 値を取って来てあげる。


  $todo = new Todo();

  $todo->update($task, $id);




// これで、どうなる。。。、
header('Location: index.php');
// これの意味は??
// 更新してsそのあとのページが意味をなくしたので、トップページに戻りますよ。