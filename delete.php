

    <?php
require_once('Models/Todo.php');


// IDを取ってきてますよ♪
$id = $_GET['id'];

//Todoクラスをインスタンス化
$todo = New Todo;

//Todoクラスのcreateメソッドを実行
$todo->delete($id);


//index.phpに戻る
// header('Location: index.php');

    // これで終わりらしい(^_^;)
    // 非常に心細い。。。

    echo json_encode($id);