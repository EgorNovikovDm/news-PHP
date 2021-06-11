<?php include("includes/header.php"); ?>
<?php include("news/includes/init.php") ?>


        <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Псоледняя новость
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                <div>
                    <?php $news= News::find_all_news();
                        foreach ($news as $new) {
                        }
                    ?>
                            <div>
                                <div class="post" >
                                    <h3 class="text-primary"><?php echo $new->name;?></h3>
                                    <img src="news/images/<?php echo ($new->image);?>"class="img-fluid card-img-top" style="max-height:450px;" alt="">
                                    <p style="margin-top: 10px"><?php echo $new->description;?></p>
                                    <span><?php echo $new->date_create;?></span>
                                </div>
                                <?php  ?>
                            </div>
                </div>
            

         

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">





        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
