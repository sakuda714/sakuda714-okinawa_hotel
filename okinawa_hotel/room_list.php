

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>沖縄ホテル 簡易版</title>
    </head>
    <body>
        <header>
            <h1>沖縄ホテル　簡易版</h1>
            <h3>～あなたに究極の癒しを～</h3>
        </header>
    
    <?php

    try{

        $dsn = 'mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM room_info';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;

        while (true) {

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec == false) {
                break;
            }
            
            print $rec['room_no'];
            print '号室';
            print '　';
            print 'タイプ：';
            print $rec['room_name'];
            print '<br>';
            print '【お部屋について】<br>';
            print $rec['room_pr'];
            print '<br>';
            print '【設備情報】';
            print '<br>';
            print $rec['room_exp'];
            print '<br>';
            print '【宿泊料金（１部屋）】';
            print '<br>';
            print '￥';
            print $rec['room_price'];
            print '<br>';
            $roomNo = htmlspecialchars($rec['room_no']);
            if ($roomNo < 200) {
                for ($i = 1; $i <= 3; $i++) {
                    $imagePath = 'room_p/room100' . '_' . $i . '.jpg';
                    echo '<img src="' . htmlspecialchars($imagePath) . '" alt="部屋の画像" style="width: 300px; height: 200px;"><br>';
                }
            } else if ($roomNo < 300) {
                for ($i = 1; $i <= 3; $i++) {
                    $imagePath = 'room_p/room200' . '_' . $i . '.jpg';
                    echo '<img src="' . htmlspecialchars($imagePath) . '" alt="部屋の画像" style="width: 300px; height: 200px;"><br>';
                    
                }
            } else if ($roomNo < 400) {
                for ($i = 1; $i <= 3; $i++) {
                    $imagePath = 'room_p/room300' . '_' . $i . '.jpg';
                    echo '<img src="' . htmlspecialchars($imagePath) . '" alt="部屋の画像" style="width: 300px; height: 200px;"><br>';
                    
                }
            }
            print '-----------------------------------------------------------------------------';
            print '<br>';


        }

    } catch (Exception $e) {
        print'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }
    ?>

    </body>
</html>
