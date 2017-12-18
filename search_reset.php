<?php

session_start();

unset($_SESSION['query']);

header('Location: catalogue.php?page=1');
exit;