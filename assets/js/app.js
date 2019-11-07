$(function () {

  // 追加ボタンがクリックされた時
  $('#add-button').on('click', function(e) {
    // formタグの送信を無効化する（二重投稿を防ぐため）
    // e.preventDefault();
    e.preventDefault();


    // 入力されたタスク名を取得
    let taskName = $('#input-task').val();



    // ajax開始
    $.ajax({
      // キー（決まった文言）：値
      // 全部そのフォームで書く！
      url: 'create.php',
      type: 'POST',
      dataType: 'json',
      data: {
        // 送信する値を書くブロック
        task: taskName
      }
    }).done((data) => {
      console.log(data);




      // $('tbody').prepend(`<p>${data['name']}</p>`);
              // ↓
              // ↓
              // ↓

      // tbodyの先頭に追加しますよ。
      // データベースの上に重なってく。
      // 上記の書き方で変数を書ける。
      // 配列の何かを指定してあげれば、それを拾ってくる。
      $('tbody').prepend(
        `<tr id='task-${data['id']}'>` + 
          `<td>${data['name']}</td>` + 
          `<td>${data['due_date']}</td>` + 
                `<td>NOT YET</td>` + 
                `<td>` + 
                    `<a class="text-success" href="edit.php?id=${data['id']}">EDIT</a>` + 
                `</td>` + 
                `<td>` + 
                    `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php?id=${data['id']}">DELETE</a>` + 
                    // data-id="${data['id']}" を追加して、
                    // 非同期のタスクのデリートを押してもIDがアラートで出るようにした。
                `</td>` + 
              `</tr>`
    );


    // 入力欄をクリアする。
    // ここに書く意義。
    $('#input-task').val('');



    }).fail((error) => {
      console.log(error);
    })

  });


  // 削除のボタンがクリックされた時の処理
  // $('.delete-button').on('click',function(){
    $(document).on('click','.delete-button',function(e){
      e.preventDefault();
      // alert('ok!');

      
      // 削除対象のIDを無効化
      let selectedId = $(this).data('id');
      // カスタム属性のIDを取ってきますよ
      // $thisっていうのは、いま実行されてるイベントを指します。
      // 今回はクリックされたaタグ本体を指す
      // alert(selectedId);

      // ajaxの開始
      $.ajax({

        url: 'delete.php',
        type: 'GET',
        dataType: 'json',
        data: {

          id : selectedId
        },

      }).done((data) => {
        console.log(data);
        // $('#task-' + data).fadeOut();
        $(`#task-${data}`).fadeOut();
        // このdataは、consoleで帰ってきてる？

      }).fail((error) => {
        console.log(error);

      })

  });

  // documentは画面全体を指す。
  // そこでクラスdelete-buttonがあると、
  // 反映されますよ。



  // $('.delete-button').on('click',function(){

  //   alert('ok!');
  // })これだけだと、アラートは反応するけど、
  // OKを押しちゃうと、消えちゃう。



  // 完了ボタンがクリックされた時
  $(document).on('click','.done-button',function(){
    alert('完了？');
  })
  // $('.done-button').on('click',function(){
  //   alert('完了？');
  // })
  // これやと、非同期のは対応しないためdocumentを入れる。

 
})
