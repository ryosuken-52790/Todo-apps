<?php

    // require_once('Models/Todo.php');
    require_once('Models/Todo.php');
    require_once('function.php');
    // これをどうやって呼び出すか？
    // 考える。




    // Todoクラスのインスタンス化
    $todo = new Todo();

    // DBからデータを全件取得
    $tasks = $todo->all();


    // var_dump($tasks);
// ryosuken

?>


<!DOCTYPE html>
<html lang="ja">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="assets/css/reset.css">
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
</head>



<body>
  <!-- トップページに戻る仕組み -->
<header class="px-5 bg-primary">

        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
       <!-- ヘッダー両サイドに言葉・文字を配列する。 -->

    <main class="container py-5">
        <section>
            <form class="form-row justify-content-center">
                 <!-- ↑ ⇧ ↑ ⇧ ↑ 抜けてる -->
                 <!-- name属性を足す。 -->
                 <!-- 足さないとデータが形として現れない。 -->
                <div class="col-10 col-md-6 py-2">
                    <input id="input-task" type="text" class="form-control" placeholder="ADD TODO"
                    name="task">
                    <!-- 足した。 -->
                </div>
                <div class="py-2 col-md-3 col-10">
                    <button id="add-button" type="submit" class="col-12 btn btn-primary">ADD</button>
                </div>
            </form>
        </section>

        <section class="mt-5">
          <table class="table table-hover">
              <thead>
                <tr class="bg-primary text-light">
                    <th class=>TODO</th>
                    <th>DUE DATE</th>
                    <th>STATUS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tasks as
                $task):?>
                <tr id="task-<?php echo h($task['id']); ?>">
                    <td>
                        <?php echo h($task['name']); ?>
                    </td>
                    <td>

                    <!-- 日付 -->
                    <?php echo date('Y/m/d',strtotime(h($task['due_date']))); ?>
                              <!-- echo date('Y/m/d'); -->
                              <!-- string date ( string $format [, int $timestamp = time() ] ) -->
                              <!-- red氏に見せてもらった。 -->
                    </td>
                        

                    <?php if($task['done_fla'] == 0): ?>
                        <td>Not yet</td>
                    <?php else: ?>
                        <td>Done</td>
                    <?php endif; ?>


                    <td>
                        <a class="text-success" href="edit.php?id=<?php echo h($task['id']);?>">EDIT</a>
                    </td>
                    <td>
                        <a data-id="<?php echo h($task['id']); ?>" class="text-danger delete-button" href="delete.php?id=<?php echo h($task['id']); ?>">DELETE</a>
                        <!-- data-id="sample" -->
                        <!-- カスタム属性(indexの中にある。) -->
                        <!-- sampleから、idが表示されるように変えた。 -->
                                <!-- ↓ -->
                        <!-- href="delete.php?id=1を追加したよ？ -->
                    </td>
                    <td>
                       <button class="btn btn-info done-button">完了</button>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>