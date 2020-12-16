<?php inc('layouts.app-start'); ?>

<div class="container">
    <div class="card" >
        <div class="card-body">

            <div class="d-flex justify-content-between">

                <h5 class="card-title">Ver Mensagem</h5>

            </div>

            <div class="mt-3">
                <h6>Nome</h6>
                <p><?= $message->name ?></p>
                <h6>Email</h6>
                <p><?= $message->email ?></p>
                <h6>Assunto</h6>
                <p><?= $message->subject ?></p>
                <h6>Mensagem</h6>
                <p><?= $message->message ?></p>
            </div>
        </div>
    </div>
</div>


<?php inc('layouts.app-end'); ?>

