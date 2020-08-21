<?php
session_start();
if (strlen($_SESSION['login']) == 0) {
    header("Location: ../../");
    exit;
} else {
    if ($_SESSION['level'] == 'user') {
        header('Location: ../user/');
        exit;
    } else if ($_SESSION['level'] == 'admin') {
        header('Location: dashboard');
        exit;
    }
}
