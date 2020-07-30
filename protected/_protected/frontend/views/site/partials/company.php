<?php foreach ($companies as $company) : ?>
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-3 wow fadeIn">
        <div class="card card-ecommerce">

            <div class="view overlay p-2">
                <a href="<?= toRoute(['company/view', 'id' => $company->companyTranslate->url, 'type' => 'local']) ?>">
                    <img src="<?= siteUrl() . 'uploads/company/thumb/' . $company->image ?>" class="img-fluid" alt="<?= $company->companyTranslate->title ?>">
                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                </a>
            </div>

            <div class="card-body">

                <h5 class="card-title mb-1">
                    <strong>
                        <a href="<?= toRoute(['company/view', 'id' => $company->companyTranslate->url, 'type' => 'local']) ?>" class="dark-grey-text"><?= substr($company->companyTranslate->title, 0, 60) ?><?= strlen($company->companyTranslate->title) < 60 ? '' : '...' ?></a>
                    </strong>
                </h5>
                <a href="<?= toRoute(['company/view', 'id' => $company->companyTranslate->url, 'type' => 'local']) ?>" class=""><?= t("More") ?></a>
            </div>

        </div>
    </div>
<?php endforeach ?>