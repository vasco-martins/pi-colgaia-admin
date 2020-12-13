<?php
$errors = errors();
inc('layouts.app-start'); ?>


<div class="container">
    <div class="card" >
        <div class="card-body">

            <h5 class="card-title mb-3"><?= $title ?></h5>

                <form method="post" action="<?= router()->url('settings.update') ?>" enctype="multipart/form-data">


                <div class="mb-3">
                    <label for="formFile" class="form-label">Logótipo do website</label>
                    <?php
                    $websiteLogo = config('global.websiteLogo');
                    if($websiteLogo): ?>
                        <img  width="150" class="img-thumbnail rounded d-block my-3" src="<?= assets('/uploads/' . $websiteLogo) ?>" alt="">
                    <?php endif;?>

                    <input class="form-control <?= array_key_exists('websiteLogo', $errors) ? 'is-invalid' : ''?>" type="file" name="websiteLogo" id="formFile">

                    <?php if(array_key_exists('websiteLogo', $errors)): ?>
                        <div class="invalid-feedback">
                            <?= $errors['banner'] ?>
                        </div>
                    <?php endif;?>
                    

                </div>

                <?php
                \Framework\Builders\BForm::input('text', 'websiteName','Nome do Website', config('global.websiteName'), $errors['websiteName'] ?? null);
                \Framework\Builders\BForm::input('text', 'websiteDescription','Descrição do Website',  config('global.websiteDescription'), $errors['websiteDescription'] ?? null);
                \Framework\Builders\BForm::input('email', 'email','Email',  config('global.email'), $errors['facebook'] ?? null);
                \Framework\Builders\BForm::input('text', 'address','Morada',  config('global.address'), $errors['address'] ?? null);
                \Framework\Builders\BForm::input('text', 'facebook','Facebook',  config('global.facebook'), $errors['facebook'] ?? null);
                \Framework\Builders\BForm::input('text', 'instagram','Instagram',  config('global.instagram'), $errors['instagram'] ?? null);
                \Framework\Builders\BForm::input('number', 'phone','Telemóvel',  config('global.phone'), $errors['phone'] ?? null);


                ?>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>



<?php inc('layouts.app-end'); ?>

