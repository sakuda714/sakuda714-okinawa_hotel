<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>沖縄ホテル　簡易版</title>
</head>

<body>
    <header>
        <h1>沖縄ホテル　簡易版</h1>
        <h3>～あなたに究極の癒しを～</h3>
    </header>

    <?php

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $reserve_date = $_POST['reserve_date'];

    if (empty($name)) {
        print '氏名が入力されていません。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    }

    if (empty($tel)) {
        print '電話番号が入力されていません。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    } elseif (!preg_match('/^\d{2,4}-\d{2,4}-\d{4}$/', $tel)) {
        print '電話番号は半角ハイフンと半角数字で入力してください。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    }

    if (empty($reserve_date)) {
        print '予約日が入力されていません。';
        exit();
    }

    try {
        $dsn = 'mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT reserve_date, room_no, name, tel, email, guest, checkin_time FROM reserve 
                WHERE name = ? AND tel = ? AND reserve_date = ?';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$name, $tel, $reserve_date]);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec) {
            print '【予約内容】<br>';
            print '　　　　予約日： ' . $rec['reserve_date'] . '<br>';
            print '　　　部屋番号： ' . $rec['room_no'] . '<br>';
            print '　　　　　氏名： ' . $rec['name'] . '<br>';
            print '　　　電話番号： ' . $rec['tel'] . '<br>';
            print 'メールアドレス： ' . $rec['email'] . '<br>';
            print '　　　宿泊人数： ' . $rec['guest'] . '人<br>';
            print '　チェックイン： ' . $rec['checkin_time'] . '<br>';
            print '予約内容に変更がある場合は、3日前までにお電話ください。<br>';
            print '沖縄ホテル：098-999-999<br>';
        } else {
            print $reserve_date . '　「' . $name . '」様でのご予約はありません。<br><br>';
        }

        $dbh = null;
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }
    ?>

    <a href="index.php">TOPページへ戻る</a>
</body>

</html>