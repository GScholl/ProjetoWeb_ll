<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <?php foreach ($css_files as $css) { ?>
        <link rel="stylesheet" href="<?= base_url($css) ?>">
    <?php } ?>
</head>

<body>
    <?= base_url("/teste/2") ?>
</body>

</html>