<?php foreach ($products as $product) : ?>
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 wow fadeIn">
        <div class="product-item mb-3">
            <a href="<?= toRoute(['/product/view', 'category' => $product->subCategory->category->categoryTranslate->url, 'sub_category' => $product->subCategory->subCategoryTranslate->url, 'id' => $product->productTranslate->url]) ?>"><img class="card-img-top" src="<?= siteUrl() . 'uploads/product/' . $product->image ?>" alt="<?= $product->productTranslate->title ?>"></a>
            <div class="card-body">
                <a class="text-dark font-weight-bold" href="<?= toRoute(['/product/view', 'category' => $product->subCategory->category->categoryTranslate->url, 'sub_category' => $product->subCategory->subCategoryTranslate->url, 'id' => $product->productTranslate->url]) ?>"><span class="card-title font-weight-regular"><?= $product->productTranslate->title ?></span></a>
                <p class="card-text"><?= $product->subCategory->subCategoryTranslate->title ?></p>
            </div>
        </div>
    </div>
<?php endforeach ?>