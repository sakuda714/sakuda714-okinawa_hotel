<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>沖縄ホテル 簡易版</title>
</head>
    <header>
        <h1>沖縄ホテル　簡易版</h1>
        <h3>～あなたに究極の癒しを～</h3>
    </header>

    
    <?php
    $room_no = $_GET['room_no'];
    $reserve_date = $_GET['reserve_date'];


    if (!$room_no || !$reserve_date) {
        print '部屋番号または予約日付が指定されていません。<br>';
        print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
        exit();
    }
    ?>

    <h3>【宿泊予約】</h3>

    <form method="post" action="reserve_check.php">
        <input type="hidden" name="room_no" value="<?php print $room_no; ?>">
        <input type="hidden" name="reserve_date" value="<?php print $reserve_date; ?>">
        　　　　　予約日：
        <?php print $reserve_date; ?><br>
        　　　　　　氏名:
        <input type="text" name="name" required><br>
        　　　　電話番号:
        <input type="tel" name="tel" required><br>
        　メールアドレス:
        <input type="email" name="email">※登録は任意になります<br>
        　　　　宿泊人数:
        <input type="number" name="guest" min="1" max="10" required><br>
        　　チェックイン:
        <select name="checkin_time" required>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
        </select><br><br>
        <input type="submit" value="送信">
    </form>
</body>
</html>
