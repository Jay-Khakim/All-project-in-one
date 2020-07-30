<?php foreach ($models as $model) : ?>
    <div class="col-6 wow fadeIn col-sm-6 col-md-6 col-lg-4 col-xl-4 mt-3">
        <div class="card card-ecommerce">

            <div class="view p-1 overlay">
                <a href="<?= toRoute(['/product/view', 'category' => $model->subCategory->category->categoryTranslate->url, 'sub_category' => $model->subCategory->subCategoryTranslate->url, 'id' => $model->productTranslate->url]) ?>">
                    <img src="<?= siteUrl() . 'uploads/product/thumb/' . $model->image ?>" class="img-fluid" alt="">
                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-1">
                    <strong>
                        <a href="<?= toRoute(['/product/view', 'category' => $model->subCategory->category->categoryTranslate->url, 'sub_category' => $model->subCategory->subCategoryTranslate->url, 'id' => $model->productTranslate->url]) ?>" class="dark-grey-text"><?= $model->productTranslate->title ?></a>
                    </strong>
                </h5>
                <div class="card-footer pb-0 px-0">
                    <div class="row text-center">
                        <div class="w-100">
                            <a href="<?= toRoute(['/company/view', 'type' => $model->company->type == \common\models\Company::TYPE_FOREIGN ? 'foreign' : 'local', 'id' => $model->company->companyTranslate->url]) ?>">
                                <span style="font-size: 12px;"><?= $model->company->companyTranslate->title ?></span>
                            </a>
                        </div>
                        <span class="float-right mx-auto">
                            <a href="<?= toRoute(['/product/view', 'category' => $model->subCategory->category->categoryTranslate->url, 'sub_category' => $model->subCategory->subCategoryTranslate->url, 'id' => $model->productTranslate->url]) ?>" class="btn px-3 py-2"><?= t("More") ?></a>
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </div>
<?php endforeach ?>