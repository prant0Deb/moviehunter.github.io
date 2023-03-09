<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require "config.php";
    $q = "select * from items where id='" . $id . "' limit 1";
    $r = $connection->query($q);
    if (!$r->num_rows) {
        exit;
    }
    $row = $r->fetch_assoc();
    // var_dump($row);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include "include/cssplagin.php"; ?><!-- css all plagin -->
    <link href="assets/css/navfooter.css" rel="stylesheet" />
    <link href="assets/css/dpage.css" rel="stylesheet" />
    <link href="assets/css/moredpage.css" rel="stylesheet" />

</head>

<body>
    <?php include "include/navbar.php"; ?><!-- navbar -->

    <div class="container bg-dark" id="download"><!-- main -->
        <div class="row text-white">

            <div class="col-lg-8"><!-- col -->
                <div class="box1"><!-- 1 -->
                    <div class="img-box">
                        <img src="admin/assets/images/<?= $row['image'] ?>" width="200px">
                    </div>
                    <div class="title1">
                        <h2 style="width: 100%;"><?= $row['name'] ?></h2>
                        <div class="type">
                            <a href="javascript:void(0);"><?= $row['country'] ?></a>
                            <a href="javascript:void(0);"><?= $row['type'] ?></a>
                            <a href="javascript:void(0);"><?= $row['language'] ?></a>
                            <a href="javascript:void(0);"><i class="bi bi-star-fill"></i> <?= $row['rating'] ?></a>
                        </div>
                        <p><?= $row['description'] ?><br> <span><?= $row['year'] ?></span></p>
                    </div>
                </div><!-- 1 -->
                <hr>
                <div class="nav2" id="typelink"><!-- 2 -->
                    <a href="javascript:void(0);" class="activebg">Info</a>
                    <a href="javascript:void(0);">Links</a>
                    <a href="javascript:void(0);">Trailer</a>
                </div><!-- 2 -->
                <hr>
                <div class="Screenshots"><!-- 3 -->
                    <p><i>Screenshots</i></p>
                    <div><img src="admin/assets/images/<?= $row['screenshot1'] ?>"></div>
                    <div><img src="admin/assets/images/<?= $row['screenshot2'] ?>"></div>
                    <div><img src="admin/assets/images/<?= $row['screenshot3'] ?>"></div>
                </div><!-- 3 -->
                <div class="backside"><!-- 4 -->
                    <p><?= $row['description'] ?></p>
                </div><!-- 4 -->
                <hr>
                <div class="downloadlinks"><!-- 5 -->
                    <div class="Links">
                        <p>Links</p>
                        <p>Links</p>
                    </div>
                    <div class="Linksside">
                        <div class="donelink">
                            <?php
                            $qqqq = "select * from items where id='" . $id . "' limit 1";
                            $rrrr = $connection->query($qqqq);
                            $iiiii = "";
                            while ($row = $rrrr->fetch_assoc()) {
                                $iiiii = ' <h6>' . $row['name'] . '</h6>
                                <h6>1080p</h6>
                                <a href="download.php?id=' . $row['id'] . '">Download</a>
                                <h6>' . $row['name'] . '</h6>
                                <h6>720p</h6>
                                <a href="download.php?id=' . $row['id'] . '">Download</a>';
                            }
                            echo $iiiii;
                            ?>
                           
                        </div>
                    </div>
                </div><!-- 5 -->
                <hr>
                <div class="share"><!-- 6 -->
                    <div class="sharebox d-flex m-4 align-items-center">
                        <h6 class="text-danger pe-2">Shared : </h6>
                        <h6 class="text-uppercase bg-primary p-2"> facebook</h6>
                    </div>
                </div><!-- 6 -->
                <hr>
                <div class="hindi-subtitle mb-4"><!-- 7 -->
                    <h5 class="title">Latest Movies</h5>
                    <div id="hindi-movie" class="owl-carousel">
                        <?php
                        $qq = "select * from items where letest_items='1' order by created_at desc limit 15";
                        $hh = $connection->query($qq);
                        $ii = "";
                        while ($row = $hh->fetch_assoc()) {
                            $ii .= '<div class="card me-2" style="width: 8rem;">
                            <img src="admin/assets/images/' . $row['image'] . '" class="card-img-top" alt="...">
                            <div class="text">
                                <a href="downloadpage.php?id=' . $row['id'] . '" class="card-text">' . $row['name'] . '</a>
                            </div>
                        </div>';
                        }
                        echo $ii;
                        ?>
                    </div>
                </div><!-- 7 -->
            </div><!-- col -->

            <div class="col-lg-4 p-4">
                <h5>Letest Updates</h5>
                <div class="row justify-content-center align-items-center mt-4">
                    <?php
                    $ss = "select * from items where letest_items='1' order by created_at desc limit 15";
                    $lit = $connection->query($ss);
                    $itm = "";
                    while ($row = $lit->fetch_assoc()) {
                        $itm .= '<div class="col-12">
                        <img src="admin/assets/images/' . $row['image'] . '" class="card-img-top m-2" alt="..." style="width: 4rem;">
                        <p class="m-2"><a href="downloadpage.php?id=' . $row['id'] . '" class="text1">' . $row['name'] . '</a> <br>
                        <span class="text2">' . $row['year'] . '</span><br>
                            <span class="text2"><i class="bi bi-star"></i>  ' .  $row['rating'] . '</span>
                        </p>
                    </div>';
                    }
                    echo $itm;
                    ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center m-3">
            <p class="lorem" style="color: white; opacity: 60%; font-size: .8em;">
                movieHunter does not rip or host any files on its servers. All files or contents hosted on third party websites. movieHunter doesn't accept the responsibility for contents hosted on third party websites. Also movieHunter doesn't RIP/Pirate any file. We just collect links from other websites. Nothing Else.</p>
        </div>

        <div class="text-sm-start">
            <a href="#" class="text-danger h4"><i class="bi bi-arrow-up"></i></a>
        </div>
    </div><!-- main -->


    <?php include "include/footer.php"; ?><!-- footer -->

    <?php include "include/jsplagin.php"; ?><!-- jsplagin -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/highlightnav.js"></script>
    <script src="assets/js/owl3.js"></script>
</body>

</html>