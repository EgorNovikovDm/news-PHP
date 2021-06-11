<?php include("includes/header.php"); ?>
<?php
    $news_id = $_GET['id'];
    $news = News::find_news_by_id($news_id);
    if (isset($_POST["Edit"])) {
        $news->name = $_POST["Title"];
        $news->description = $_POST["Description"];
        $news->date_create = date('Y-m-d');
        $news->image = $_FILES["Image"]["name"];
        $tmp_file = $_FILES['Image']['tmp_name'];
        move_uploaded_file($tmp_file, "../images/" . $news->image);
        $news->update();
        $news->redirect("../");
    }
    if (isset($_POST["Delete"])) {
        $news->delete();
        $news->redirect("../");
    }

?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <?php include("includes/top_nav.php"); ?>

                <?php include("includes/side_nav.php") ?>

        </nav>

        <div id="page-wrapper">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Редактировать новость
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="../../index.php">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-fw fa-wrench"></i><a href="../add/index.php">Добавить новость</a>
                        </li>
                    </ol>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <label>Название:</label>
                <input type="text" required="" name="Title" value="<?php echo $news->name; ?>">
                <label>Описание:</label>
                <textarea required="" name="Description" ><?php echo $news->description; ?></textarea>
                <img src="../images/<?php echo ($news->image);?>"class="img-fluid card-img-top" style="max-height:450px;" alt="">
                <input type="file" class="form-control-file" name="Image" value="">
                <button type="submit" name="Edit" class="btn btn-success">Редактировать пост</button>
                <button type="submit" name="Delete" class="btn btn-danger">Удалить пост</button>
            </form>

        </div>

        </div>


  <?php include("includes/footer.php"); ?>