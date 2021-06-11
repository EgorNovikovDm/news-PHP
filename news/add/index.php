<?php include("includes/header.php"); ?>
<?php
if (isset($_POST["Submit"])) {
    $news = new News();
    $news->name = $_POST["Title"];
    $news->description = $_POST["Description"];
    $news->image = $_FILES["Image"]["name"];
    $tmp_file = $_FILES['Image']['tmp_name'];
    move_uploaded_file($tmp_file, "../images/" . $news->image);
    $news->date_create = date("Y-m-d");
    $news->create();
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
                        Добавить новость
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="../../index.php">Главная</a>
                        </li>
                    </ol>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <label>Название:</label>
                <input type="text" required="" name="Title">
                <label>Описание:</label>
                <textarea required="" name="Description"></textarea>
                <label>Картинка:</label>
                <input type="file" class="form-control-file" name="Image">
                <button type="submit" name="Submit" class="btn btn-success">Добавить пост</button>
            </form>

        </div>


    </div>


<?php include("includes/footer.php"); ?>