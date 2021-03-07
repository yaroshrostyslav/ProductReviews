<?php
require_once('classes/Product.php');

$s = @$_GET['s'];
$p = @$_GET['p'];

$product = new Product();
$allProducts = $product->getAllProducts($s, $p);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Товары</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="addProduct.php">Добавить</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <main>
        <div class="py-5"></div>
        <h2>Товары</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Отзывы</th>
                    <th>Добавлено</th>
                </tr>
                </thead>
                <thead>
                <tr>
                    <td></td>
                    <td>от <a href="?s=name&p=asc">А до Я</a> / <a href="?s=name&p=desc">Я до А</a></td>
                    <td>от <a href="?s=creator_name&p=asc">А до Я</a> / <a href="?s=creator_name&p=desc">Я до А</a></td>
                    <td>от <a href="?s=reviews&p=asc">мин</a> / <a href="?s=reviews&p=desc">макс</a></td>
                    <td><a href="?s=date&p=asc">старые</a> / <a href="?s=date&p=desc">новые</a></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allProducts as $pr):?>
                    <tr>
                        <td><img src="<?=$pr['image_url']?>" width="30"/> </td>
                        <td><a href="product.php?id=<?=$pr['id']?>"><?=$pr['name']?></a> </td>
                        <td><?=$pr['creator_name']?></td>
                        <td><?=$pr['reviews']?></td>
                        <td><?=$pr['date']?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 </p>
    </footer>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/form-validation.js"></script>
</body>
</html>

