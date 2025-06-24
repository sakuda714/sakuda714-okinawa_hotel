<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>沖縄ホテル 簡易版</title>
</head>
<body>
    <header>
        <h1>沖縄ホテル 簡易版</h1>
        <h3>～あなたに究極の癒しを～</h3>
    </header>

    <?php
    if (!isset($_POST['reserve_date']) || empty($_POST['reserve_date'])) {
        echo '予約日が選択されていません。<br>';
        echo '<a href="index.php">戻る</a>';
        exit();
    }

    $reserve_date = htmlspecialchars($_POST['reserve_date']);

    try {
        $dsn = 'mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT r.room_no, r.room_name 
                FROM room_info r 
                LEFT JOIN reserve re 
                ON r.room_no = re.room_no AND re.reserve_date = :reserve_date 
                WHERE re.room_no IS NULL';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':reserve_date', $reserve_date, PDO::PARAM_STR);
        $stmt->execute();

        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($rooms)) {
            echo '満室のため予約できません。<br>';
        } else {
            echo '【［' . htmlspecialchars($reserve_date) . '］の空室一覧】<br>';
            foreach ($rooms as $room) {
                echo '<a href="reserve.php?room_no=' . urlencode($room['room_no']) . '&reserve_date=' . urlencode($reserve_date) . '">' . htmlspecialchars($room['room_no']) . '</a>';
                echo '　'  . htmlspecialchars($room['room_name']) . '<br>';
            }
        }

    } catch (Exception $e) {
        echo 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }
    ?>

</body>
</html>
