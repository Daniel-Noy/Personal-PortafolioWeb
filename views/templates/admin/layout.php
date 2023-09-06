<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icons/favicon.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/build/css/app.css">
    <title><?php echo $title; ?></title>
</head>
<body class="dashboard">
    <?php include_once __DIR__ . '/header.php' ?>

    <div class="dashboard__grid">
        <?php include_once __DIR__ . '/aside.php' ?>
        
        <main class="dashboard__content">
            <?php echo $content; ?>
        </main>
    </div>

    <script type="module" src="/build/js/app.js" defer></script>
</body>
</html>