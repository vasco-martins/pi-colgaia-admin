<?php inc('layouts.app-start'); ?>

<div class="container">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h5 class="card-title">Páginas</h5>

                <div class="buttons">
                    <a href="<?= router()->url('pages.create') ?>" type="button" class="btn btn-info text-white">Nova Página</a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Slug</th>
                    <th scope="col-">Template</th>
                    <th scope="col">Ordem</th>
                    <th scope="col">Pai</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pages as $page): ?>
                    <tr>
                        <th><?= truncate($page->title, 30)?></th>
                        <td><?= truncate($page->slug, 30)?></td>
                        <td><?= $page->template()->name ?></td>
                        <td><?= $page->position ?></td>
                        <td><?= $page->page()->title ?? '<span class="text-muted">Sem pai</span>' ?></td>
                        <td>
                            <a href="<?= router()->url('pages.edit', ['id' => $page->id]) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="<?= router()->url('pages.destroy', ['id' => $page->id]) ?>" class="btn btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php inc('layouts.app-end'); ?>

