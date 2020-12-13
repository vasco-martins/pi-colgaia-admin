<?php

inc('inc.header');
inc('inc.navbar');

$status = session()->getFlashBag()->get('status');

if($status) {?>
        <div class="container">
    <div class="alert alert-success" role="alert">
        <?= $status[0] ?>
    </div>  </div>

    <?php
}


