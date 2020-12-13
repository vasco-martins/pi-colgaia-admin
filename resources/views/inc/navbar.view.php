<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5" style="background-color: #093d5c !important;">
    <div class="container">
        <a class="navbar-brand" href="#"><?= config('global.websiteName') ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= isActiveRoute('home.index') ?>" aria-current="page" href="<?= router()->url('home.index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isActiveRoute('pages.*') ?>" href="<?= router()->url('pages.index') ?>">Páginas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= isActiveRoute('news.*') ?>" href="<?= router()->url('news.index') ?>">Notícias</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= isActiveRoute('settings.*') ?>" href="<?= router()->url('settings.edit') ?>">Definições</a>
                </li>

            </ul>

           <div class="navbar-nav ml-md-auto">
               <li class="nav-item">
                   <a class="nav-link " aria-current="page" href="<?= router()->url('auth.logout') ?>">Logout</a>
               </li>
           </div>
        </div>
    </div>
</nav>
