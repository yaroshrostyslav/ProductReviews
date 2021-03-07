<?php
require_once('classes/Product.php');

if (isset($_POST['addProduct'])){
    $product = new Product();
    $product->addProduct($_POST);
    $result = $product->result;
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавить товар</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
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
                        <a class="nav-link " href="index.php">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="addProduct.php">Добавить</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <main>
        <div class="py-5"></div>
        <div class="row g-3">
            <?php if (isset($result)):?>
            <div class="col-md-7 col-lg-8 m-auto">
                <div class="row">
                    <?php if ($result >= 1):?>
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-success">
                                    <strong>Successfully!</strong> Товар успешно добавлен.
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-danger">
                                    <strong>Error!</strong> Ошибка добавления товара.
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-7 col-lg-8 m-auto">
                <h4 class="mb-3">Новый товар</h4>
                <form class="needs-validation" action="" method="post">
                    <div class="row g-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="image_url" class="form-label">Изображение</label>
                                <input type="text" class="form-control" name="image_url" placeholder="url" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="avg_price" class="form-label">Средняя цена</label>
                                <input type="text" inputmode="numeric" class="form-control" name="avg_price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="creator_name" class="form-label">Ваше имя</label>
                                <input type="text" class="form-control" name="creator_name" required>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="addProduct">Добавить</button>
                </form>
            </div>
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