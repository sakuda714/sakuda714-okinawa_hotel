

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>沖縄ホテル 簡易版</title>
    </head>
    <body>
        <!--ヘッダー-->
        <header>
            <h1>沖縄ホテル　簡易版</h1>
            <h3>～あなたに究極の癒しを～</h3>
        </header>

        <div class="menu">
            <ul>
                <li>
                    <form method="post" action="room_select.php">
                    宿泊予定日を選択<br>
                        　予約日：<input type="date" name="reserve_date"><br>
                        <input type="submit" value="空室一覧へ">
                    </form>
                </li>
                <li><a href="room_list.php">お部屋一覧</a></li>
                <li>
                    <form method="post" action="reserve_conf.php">
                        予約内容確認<br>
                        　　氏名：<input type="text" name="name"><br>
                        　予約日：<input type="date" name="reserve_date"><br>
                        電話番号：<input type="text" name="tel"><br>
                        <sup>※半角数字ならびに半角ハイフンありで入力</sup><br>
                        <input type="submit" value="予約確認へ">
                    </form>
                </li>
                <li><a href="new_member.php">新規会員登録</a></li>
                <li><a href="login.html">ログイン</a></li>
            </ul>
        </div>
    </body>
</html>