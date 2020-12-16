<?php inc('layouts.app-start'); ?>

<div class="container">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h5 class="card-title">Mensagens</h5>

            </div>

            <div class="table-responsive my-4">
                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($messages as $message): ?>
                    <tr>
                        <th><?= truncate($message->name, 30)?></th>
                        <td><?= truncate($message->email, 30)?></td>
                        <td><?= truncate($message->subject, 60)?></td>
                        <td>
                            <a href="<?= router()->url('messages.show', ['id' => $message->id]) ?>" class="btn btn-sm btn-primary">Ver</a>
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

