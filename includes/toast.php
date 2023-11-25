<?php
if (isset($_SESSION['toast_message'])) {
    $message = $_SESSION['toast_message']['message'];
    $type = $_SESSION['toast_message']['type'];

    echo '<script>toastAlert("' . $message . '","' . $type . '")</script>';

    unset($_SESSION['toast_message']);
}

