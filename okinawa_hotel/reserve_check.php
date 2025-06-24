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
    $email = $_POST['email'] ?: '登録なし';
    $guest = $_POST['guest'];
    $checkin_time = $_POST['checkin_time'];
    $room_no = $_POST['room_no'];
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

    if (empty($guest)) {
        print '宿泊人数が入力されていません。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    } elseif (!is_numeric($guest) || $guest < 1 || $guest > 10) {
        print '宿泊人数は1人以上10人以下で入力してください。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    }

    if (empty($checkin_time)) {
        print 'チェックイン希望時間が選択されていません。';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    }

    print '【宿泊予約】<br>';
    print '　　　　予約日: ' . $reserve_date . '<br>';
    print '　　　　　氏名: ' . $name . '<br>';
    print '　　　電話番号: ' . $tel . '<br>';
    print 'メールアドレス: ' . $email . '<br>';
    print '　　　宿泊人数: ' . $guest . '人' . '<br>';
    print '　チェックイン: ' . $checkin_time . '<br>';
    print '上記の内容がよろしければ、「予約確定」ボタンを押してください。<br>'
    ?>

    <form method="post" action="reserve_done.php">
        <input type="hidden" name="reserve_date" value="<?php print $reserve_date; ?>">
        <input type="hidden" name="name" value="<?php print $name; ?>">
        <input type="hidden" name="tel" value="<?php print $tel; ?>">
        <input type="hidden" name="email" value="<?php print $email; ?>">
        <input type="hidden" name="guest" value="<?php print $guest; ?>">
        <input type="hidden" name="checkin_time" value="<?php print $checkin_time; ?>">
        <input type="hidden" name="room_no" value="<?php print $room_no; ?>">
        <input type="submit" value="予約確定">
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>
