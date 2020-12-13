<?php
$errors = errors();
inc('layouts.app-start'); ?>


<div class="container">
    <div class="card" >
        <div class="card-body">

            <h5 class="card-title mb-3"><?= $title ?></h5>

            <?php if(isset($page)): ?>
                <form method="post" action="<?= router()->url('news.update', ['id' => $page->id]) ?>" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $page->id ?>" name="id">
            <?php else: ?>
                <form method="post" action="<?= router()->url('news.store') ?>" enctype="multipart/form-data">
            <?php endif; ?>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Banner</label>
                        <input class="form-control <?= array_key_exists('banner', $errors) ? 'is-invalid' : ''?>" type="file" name="banner" id="formFile">

                        <?php if(array_key_exists('banner', $errors)): ?>
                            <div class="invalid-feedback">
                                <?= $errors['banner'] ?>
                            </div>
                        <?php endif;?>
                    </div>

                <?php
                \Framework\Builders\BForm::input('text', 'title','Título', $page->title ?? '', $errors['title'] ?? null);
                \Framework\Builders\BForm::input('text', 'slug','Slug', $page->slug ?? '', $errors['slug'] ?? null);
                \Framework\Builders\BForm::input('text', 'subtitle','Subtítulo', $page->subtitle ?? '', $errors['subtitle'] ?? null);
                ?>


                <div class="mb-3">
                    <label>Conteúdo</label>
                    <textarea id="summernote" class="form-control" name="content"><?= $page->content ?? '' ?></textarea>
                    <?php if(array_key_exists('content', $errors)) \Framework\Builders\BForm::error($errors['content']);?>
                </div>


                <button type="submit" class="btn btn-primary"><?= isset($page) ? 'Editar' : 'Adicionar' ?></button>
            </form>
        </div>
    </div>
</div>



<?php inc('layouts.app-end'); ?>

