<?php
session_start();

$timeout = 10; 


if (isset($_SESSION['chat_created_time'])) {
    if (time() - $_SESSION['chat_created_time'] > $timeout) {
        unset($_SESSION['chat']);
        unset($_SESSION['chat_created_time']);
    }
}


if (!isset($_SESSION['chat_created_time'])) {
    $_SESSION['chat_created_time'] = time();
}

$chat = $_SESSION['chat'] ?? [];

$question = trim($_POST['question'] ?? '');

$answer = "Xin lỗi, tôi chưa hiểu câu hỏi.";

if (preg_match('/(chào|hello|hi)/i', $question)) {
    $answer = "Chào bạn! Tôi có thể giúp gì cho bạn?";
} elseif (preg_match('/(giờ mở cửa|mấy giờ)/i', $question)) {
    $answer = "Chúng tôi mở cửa từ 8h đến 21h mỗi ngày.";
} elseif (preg_match('/(sản phẩm|có gì|bán gì)/i', $question)) {
    $answer = "Chúng tôi bán cây cảnh, chậu, và quà tặng.";
}

if ($question !== '') {
    $chat[] = ["user" => $question, "Plantiquee" => $answer];
    $_SESSION['chat'] = $chat;
    $_SESSION['chat_created_time'] = time();
}


foreach ($chat as $msg) {
    echo '<div class="message user-msg"><div class="bubble">Bạn: ' .$msg['user'] . '</div></div>';
    echo '<div class="message bot-msg"><div class="bubble">Plantiquee: ' . $msg['Plantiquee'] . '</div></div>';
}
?>
