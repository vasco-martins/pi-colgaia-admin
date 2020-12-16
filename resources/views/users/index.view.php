<?php inc('layouts.app-start'); ?>

<div class="container">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h5 class="card-title">Utilizadores</h5>

                <div class="buttons">
                    <a href="<?= router()->url('users.create') ?>" type="button" class="btn btn-info text-white">Novo Utilizador</a>
                </div>
            </div>

            <div class="table-responsive my-4">
                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <th><?= truncate($user->name, 30)?></th>
                        <td><?= truncate($user->email, 30)?></td>
                        <td>
                            <a href="<?= router()->url('users.edit', ['id' => $user->id]) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="<?= router()->url('users.destroy', ['id' => $user->id]) ?>" class="btn btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<?php inc('layouts.app-end'); ?>

