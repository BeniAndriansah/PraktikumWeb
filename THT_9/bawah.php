<?php

class FormHandler {
    private $filePath = 'chat_log.txt';

    public function __construct() {
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, '');
        }
    }

    public function saveMessage($email, $message) {
        $data = "Email: $email\nMessage: $message\n\n";
        file_put_contents($this->filePath, $data, FILE_APPEND);
    }

    public function displayResult($email, $message) {
        echo "<div class='result'>";
        echo "<h3>Terima kasih atas masukannya!</h3>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
        echo "<p>Message: " . htmlspecialchars($message) . "</p>";
        echo "</div>";
    }
}

$formHandler = new FormHandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    $formHandler->saveMessage($email, $message);

    $formHandler->displayResult($email, $message);
}

header("Location: contact.php");
exit();

?>
