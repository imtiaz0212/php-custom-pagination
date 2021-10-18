<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Pagination</title>
</head>
<body>
<div class="jumbotron">
    <h1 class="display-4">PHP Custom Pagination</h1>

    <hr class="my-4">

    <?php
    $page      = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $totalPage = 20;
    $mainRang  = range($page, $totalPage);

    if (count($mainRang) >= 5) {
        $subRang = range($page, ($page + 4));
    } else {
        $lPage = 4 - ($totalPage - $page);
        $subRang = range(($page - ($lPage != 0 ? $lPage : 5)), $totalPage);
    }

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $curl     = $protocol . $_SERVER['HTTP_HOST'] .'/'. explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[1];

    ?>

    <?php if ($totalPage > 1) { ?>
        <nav aria-label="...">
            <ul class="pagination">

                <li class="page-item">
                    <a class="page-link" href="<?php echo $curl . '?page=' . 1; ?>" tabindex="-1" aria-disabled="true">First</a>
                </li>

                <li class="page-item <?php echo ($page <= 1 ? 'disabled' : ''); ?>">
                    <a class="page-link" href="<?php echo $curl . '?page=' . ($page-1); ?>" tabindex="-1" aria-disabled="true">Prev</a>
                </li>

                <?php
                foreach ($subRang as $item) {
                    $url = $curl . '?page=' . $item;
                    ?>
                    <li class="page-item <?php echo($page == $item ? 'active' : ''); ?>">
                        <a class="page-link" href="<?php echo $url; ?>"><?php echo $item; ?></a>
                    </li>
                <?php }
                ?>

                <li class="page-item <?php echo ($page == $totalPage ? 'disabled' : ''); ?>">
                    <a class="page-link" href="<?php echo $curl . '?page=' . ($page+1); ?>">Next</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="<?php echo $curl . '?page=' . $totalPage; ?>" tabindex="-1" aria-disabled="true">Last</a>
                </li>
            </ul>
        </nav>
    <?php } ?>

    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="https://github.com/imtiaz0212/php-custom-pagination" role="button">Learn more</a>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>
</html>
