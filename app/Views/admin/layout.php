<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php echo view('admin/layout/header'); ?>
    <?php echo view('admin/layout/sidebar'); ?>
 


    <main class="container mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <?php echo view('admin/layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
