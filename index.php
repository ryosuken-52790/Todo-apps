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


?>


<!DOCTYPE html>
<html lang="ja">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="assets/css/reset.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <main class="container py-5">
        <section>
            <form class="form-row justify-content-center" action="create.php" method="POST">
                 <!-- ↑ ⇧ ↑ ⇧ ↑ 抜けてる -->
                 <!-- name属性を足す。 -->
                 <!-- 足さないとデータが形として現れない。 -->
                <div class="col-10 col-md-6 py-2">
                    <input type="text" class="form-control" placeholder="ADD TODO"
                    name="task">
                    <!-- 足した。 -->
                </div>
                <div class="py-2 col-md-3 col-10">
                    <button type="submit" class="col-12 btn btn-primary">ADD</button>
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
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tasks as
                $task):?>
                <tr>
                    <td>
                        <?php echo $task['name']; ?>
                    </td>
                    <td><?php echo h($task['due_date']); ?></td>
                    <td>NOT YET</td>
                    <td>
                        <a class="text-success" href="edit.php">EDIT</a>
                    </td>
                    <td>
                        <a class="text-danger" href="delete.php">DELETE</a>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </section>
    </main>

</body>
</html>