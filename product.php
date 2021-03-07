<?php
require_once('classes/Product.php');
require_once('classes/Reviews.php');

if (isset($_GET['id']) && empty($_GET['id']) !== true){
    $product_id = $_GET['id'];
}else{
    header("Location: index.php");
}

$product = new Product();
$productData = $product->getProduct($product_id);

$reviews = new Reviews();
$getAllReviews = $reviews->getAllReviews($product_id);

$allReviews = [];
$sum_grade = 0;
$avg_grade = 0;

if ($reviews->result > 0){
    foreach ($getAllReviews as $review){
        $allReviews[] = $review;
        $sum_grade += $review['grade'];
    }
    $avg_grade = round($sum_grade / count($allReviews), 2);
}

if (isset($_POST['addReview'])){
    $reviews->addReviews($_POST);
    $result = $reviews->result;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Товар - <?=$productData['name']?></title>
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
        <?php if (isset($result)):?>
            <div class="row g-3">
                    <div class="col-md-7 col-lg-8 m-auto">
                        <div class="row">
                            <?php if ($result >= 1):?>
                                <div class="col-lg-12">
                                    <div class="bs-component">
                                        <div class="alert alert-dismissible alert-success">
                                            <strong>Successfully!</strong> Отзыв успешно добавлен.
                                            <script>
                                                setTimeout(function(){
                                                    document.location.replace('<?="product.php?id=$product_id"?>');
                                                }, 2000);
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-12">
                                    <div class="bs-component">
                                        <div class="alert alert-dismissible alert-danger">
                                            <strong>Error!</strong> Ошибка добавления отзыва.
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 box-shadow p-3">
                    <h3><?=$productData['name']?></h3>
                    <img class="card-img-top m-auto"  src="<?=$productData['image_url']?>" style="max-width: 250px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <span class="m-lg-1">Средняя оценка: <b><?=$avg_grade?></b></span>
                            </div>
                            <small class="text-muted"><?=$productData['date']?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h2>Отзывы</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Оценка</th>
                            <th>Комментарий</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allReviews as $rev):?>
                            <tr>
                                <td><?=$rev['reviewer_name']?></td>
                                <td><?=$rev['grade']?></td>
                                <td><?=$rev['text']?></td>
                                <td><?=$rev['date']?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col-md-6 m-auto">
                <h3 class="mb-3">Добавить отзыв</h3>
                <form class="needs-validation" action="" method="post">
                    <input type="hidden" name="product_id" value="<?=$product_id?>">
                    <div class="row g-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="reviewer_name" class="form-label">Ваше имя</label>
                                <input type="text" class="form-control" name="reviewer_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="grade" class="form-label">Оценка</label>
                                <input type="number" inputmode="numeric" class="form-control" name="grade" placeholder="1-10" min="1" max="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="text" class="form-label">Комментарий</label>
                                <textarea class="form-control" name="text" required></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="addReview">Добавить</button>
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

