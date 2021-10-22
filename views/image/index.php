<?php
/* @var $this yii\web\View */
/* @var $imagesList app\models\Image */

?>

<div class="page-posts no-padding">
    <div class="row">
        <div class="page page-post col-sm-12 col-xs-12">
            <div class="blog-posts blog-posts-large">
                <div class="row">

                    <?php if ($imagesList): ?>
                        <?php foreach ($imagesList as $image): ?>

                            <!-- image item -->
                            <article class="post col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="title">
                                            <span><?= $image->title ?></span>
                                        </div>
                                        <div class="image">
                                            <a href="#">
                                                <img src="/uploads/<?php echo $image->title ?>" style="max-width: 400px;">
                                            </a>
                                        </div>
                                        <div class="date">
                                            <span><?= $image->create_at ?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="col-md-12">
                            <h2>Nobody images yet!</h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>