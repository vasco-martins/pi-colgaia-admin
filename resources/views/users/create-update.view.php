<?php
$errors = errors();
inc('layouts.app-start'); ?>


<div class="container">
    <div class="card" >
        <div class="card-body">

            <h5 class="card-title mb-3"><?= $title ?></h5>

            <?php if(isset($user)): ?>
                <form method="post" action="<?= router()->url('users.update', ['id' => $user->id]) ?>">
                    <input type="hidden" value="<?= $user->id ?>" name="id">
            <?php else: ?>
                <form method="post" action="<?= router()->url('users.store') ?>">
            <?php endif; ?>



                <?php
                if($errors) dd($errors);

                \Framework\Builders\BForm::input('text', 'name','Nome', $user->name ?? '', $errors['title'] ?? null);
                \Framework\Builders\BForm::input('email', 'email','Email', $user->email ?? '', $errors['email'] ?? null);
                \Framework\Builders\BForm::input('password', 'password','Password', '', $errors['password'] ?? null);
                ?>


                <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Editar' : 'Adicionar' ?></button>
            </form>
        </div>
    </div>
</div>



<?php inc('layouts.app-end'); ?>

