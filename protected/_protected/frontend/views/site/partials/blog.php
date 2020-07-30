<?php foreach ($blogs as $index => $blog) : ?>

    <?php if ($index % 2 == 0) : ?>
        <div class="row align-items-center mb-3">
            <div class="col-lg-5">
                <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                    <a href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>">
                        <img class="img-fluid" src="<?= siteUrl() . 'uploads/blog/' . $blog->image ?>" alt="<?= $blog->blogTranslate->title ?>">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <h4 class="font-weight-bold mb-1"><strong><?= $blog->blogTranslate->title ?></strong></h4>

                <p>
                    <?php

                            $str = substr($blog->blogTranslate->description, 0, 300);

                            $result = substr($str, 0, strrpos($str, ' '));
                            echo $result;

                            ?>
                </p>

                <p> <?= date('d/m/Y', $blog->created_at) ?></p>
                <a class="btn btn-primary btn-md mx-0" href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>"><?=t("More")?></a>
            </div>
        </div>

    <?php else : ?>
        <div class="row align-items-center mb-3">
            <div class="col-lg-7">
                <h4 class="font-weight-bold mb-1"><strong><?= $blog->blogTranslate->title ?></strong></h4>

                <p>
                <?php

                        $str = substr($blog->blogTranslate->description, 0, 300);

                        $result = substr($str, 0, strrpos($str, ' '));
                        echo $result;

                        ?>
                </p>

                <p><?= date('d/m/Y', $blog->created_at) ?></p>
                <a class="btn btn-success btn-md btn-rounded mx-0" href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>"><?=t("More")?></a>
            </div>
            <div class="col-lg-5">
                <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                    <a href="<?= toRoute(['/blog/view', 'id' => $blog->blogTranslate->url]) ?>">
                        <img class="img-fluid" src="<?= siteUrl() . 'uploads/blog/' . $blog->image ?>" alt="<?= $blog->blogTranslate->title ?>">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
            </div>
        </div>
    <?php endif ?>

<?php endforeach ?>