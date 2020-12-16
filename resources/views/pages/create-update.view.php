<?php
$errors = errors();
inc('layouts.app-start'); ?>


<div class="container">
    <div class="card" >
        <div class="card-body">

            <h5 class="card-title mb-3"><?= $title ?></h5>

            <?php if(isset($page)): ?>
                <form method="post" action="<?= router()->url('pages.update', ['id' => $page->id]) ?>" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $page->id ?>" name="id">
            <?php else: ?>
                <form method="post" action="<?= router()->url('pages.store') ?>" enctype="multipart/form-data">
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
                \Framework\Builders\BForm::input('number', 'position','Ordem', $page->order ?? 1, $errors['positon'] ?? null);

                ?>


                <div class="mb-3">
                    <label>Conteúdo</label>
                    <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style"height:500px" id="summernote" class="form-control" name="content"><?= $page->content ?? '' ?></textarea>
                    <?php if(array_key_exists('content', $errors)) \Framework\Builders\BForm::error($errors['content']);?>
                </div>

                <div class="mb-3">
                    <label>Template</label>
                    <select class="form-select <?= array_key_exists('template_id', $errors) ? 'is_invalid' : ''  ?>" name="template_id" aria-label="Selecional Template">

                        <?php foreach($templates as $template): ?>
                            <?php if (isset($page) && ($page->template_id == $template->id)): ?>
                                <option selected value="<?= $template->id ?>"><?= $template->name ?></option>
                            <?php else: ?>
                                <option value="<?= $template->id ?>"><?= $template->name ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php
                        if(array_key_exists('template_id', $errors)):?>
                        <div class=\"invalid-feedback\">
                            <?= $errors['template_id'] ?>
                        </div>
                        <?php endif; ?>

                    </select>
                </div>

                    <div class="mb-3">
                        <label>Página parente</label>
                        <select class="form-select <?= array_key_exists('template_id', $errors) ? 'is_invalid' : ''  ?>" name="page_id" aria-label="Página parente">
                            <option value="0">Sem página parente</option>
                            <?php foreach($pages as $p): ?>
                                <?php if(isset($page) && $page->id == $p->id) continue; ?>
                                <?php if (isset($page) && ($page->page_id == $p->id)): ?>
                                    <option selected value="<?= $p->id ?>"><?= $p->title ?></option>
                                <?php else: ?>
                                    <option value="<?= $p->id ?>"><?= $p->title ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php
                            if(array_key_exists('page_id', $errors)):?>
                                <div class=\"invalid-feedback\">
                                    <?= $errors['template_id'] ?>
                                </div>
                            <?php endif; ?>

                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary"><?= isset($page) ? 'Editar' : 'Adicionar' ?></button>
            </form>
        </div>
    </div>
</div>



<?php inc('layouts.app-end'); ?>

