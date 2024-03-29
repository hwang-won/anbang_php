<?php
    include "lib.php";

    $idx = $_GET['idx'];

    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from sign_board where idx='$idx'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" />
    <script src="https://kit.fontawesome.com/7395e48b31.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <title>안방</title>
</head>
    <body>
        <!-- navbar -->
        <nav id="navbar">
            <div class="navbar__logo">
                <i class="fas fa-seedling"></i>
                <a href="../index.html">안방</a>
            </div>
            <div>
                <ul class="navbar__menu">
                    <a href="../index.html">
                        <li class="navbar__menu__item">지도</li>
                    </a>
                    <a href="list.php">
                        <li class="navbar__menu__item">게시판</li>
                    </a>
                </ul>
            </div>
        </nav>
    
        <!-- section (board) -->
        <section id="board">
            <div class="board__list">
                <form action="writePost.php" method="post">
                <input type="hidden" name="idx" value="<?php echo $idx ?>">
                <table class="board__list__write">
                    <tr>
                        <th>이름</th>
                        <td> <input type="text" name="name" value="<?php echo $data["name"]?>"> </td>
                    </tr>
                    <tr>
                        <th>제목</th>
                        <td> <input type="text" name="subject" value="<?php echo $data["subject"]?>" style="width:80%;"> </td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td> 
                            <textarea name="memo" style="width:80%; height:300px;"><?php echo $data["memo"]?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호</th>
                        <td> <input type="password" name="pwd" placeholder="비밀번호" size="20"> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="text-align:center;">
                                <input type="submit" value="저장">
                            </div>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </section>
    </body>
</html>