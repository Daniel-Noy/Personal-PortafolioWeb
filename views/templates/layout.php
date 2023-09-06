<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="/img/icons/favicon.png" type="image/png">
    <link rel="stylesheet" href="/build/css/app.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php include_once __DIR__ . '/header.php' ?>
    <?php echo $content; ?>
    <?php include_once __DIR__ . '/footer.php' ?>
    <script type="module" src="/build/js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/7242c0275d.js" crossorigin="anonymous"></script>
</body>
</html>