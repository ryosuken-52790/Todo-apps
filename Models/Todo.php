<?php

// require_once('config/dbconnect.php');
require_once 'config/dbconnect.php';

// ここでphpを閉めなくていい理由は??



class Todo
{
    private $table = 'tasks';
    private $db_manager;
    // 意味としては、tableという変数プロパティに'tasks'を入れます。


    
    public function __construct()
    // 初期化しまーす。使えるようにしまーす。
    {
        $this->db_manager = new DbManager();
        // dbconnectのclassを起動させるよ♪
        $this->db_manager->connect();
        // class DbManager の public function connect();を引っ張ってくるよ
    }




    public function create($name)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO '.$this->table.' (name) VALUES (?)');
        $stmt->execute([$name]);
        //最新のタスクのIDを返す
        $latestId = $this->db_manager->dbh->lastInsertId();
            // lastInsertIdは決まり文句。


        return $latestId;
    }
    



    //一覧を呼び出すためのメソッド
    public function all()
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        // fetchAllだと一覧を表示できる。？？合ってる？

        return $tasks;
    }

// 一個だけメソッドを取り出すためのもの

public function get($id)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$id]);
        $task = $stmt->fetch();
        return $task;
    }

public function update($name, $id)
{
    $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table .' SET name = ? WHERE id = ?');
    $stmt->execute([$name, $id]);
}
    // *書いてる時にvar_dumpの仕方がわかんないなぁ。
    // 削除するためのメソッド
    public function delete($id)
    {
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table .' WHERE id = ?');
        return $stmt->execute([$id]);
    }


    // タスクを完了させるためのメソッド
    public function done($id)
    {
        // SQLの準備
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table .' SET done_fla = 1 WHERE id = ?');
        // SQLの実行
        // やったら１に更新するよ。
        $stmt->execute([$id]);
        
    }

    
}
