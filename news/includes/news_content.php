<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Новости
                            <small>Соритровать</small>
                            <form method="post" style="margin-left: 0">
                                <button class="sort" name="new" id="sort-asc">От новых</button>
                                <button class="sort" name="old" id="sort-desc">От старых</button>
                            </form>
                        </h1>
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Главная</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-wrench"></i><a href="add">Добавить новость</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
    <?php
    $news= News::find_all_news();
    if(isset($_POST['old'])) {

    }elseif(isset($_POST['new'])) {
        $news = array_reverse($news);
    }

        foreach (($news) as $new) {

    ?>
    <div class="news-wrap">
        <div class="post">
            <a href="./edit/?id=<?php echo $new->id; ?>"><h3><?php echo $new->name;?></h3></a>
            <img src="images/<?php echo ($new->image);?>"class="img-fluid card-img-top" style="max-height:450px;" alt="">
            <p><?php echo $new->description;?></p>
            <span class="date-create"><?php echo $new->date_create;?></span>
        </div>
    </div>

<?php
        }
 ?>
<!--    Pagination-->


    <!-- /.container-fluid -->
