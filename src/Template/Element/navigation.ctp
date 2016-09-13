<nav class="navbar navbar-ffbe">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li <?= ($this->request->controller === 'Units' && $this->request->action === 'index' && $this->request->params['type'] === 'all') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Units', ['controller' => 'Units', 'action' => 'index', 'type' => 'all'])?>
            </li>

            <li <?= ($this->request->controller === 'Units' && $this->request->action === 'index' && $this->request->params['type'] === 'acquired') ? 'class="active"' : ''?>>
                <?= $this->Html->link('My units', ['controller' => 'Units', 'action' => 'index', 'type' => 'acquired'])?>
            </li>

            <li <?= ($this->request->controller === 'Units' && strpos($this->request->action, 'party') !== false) ? 'class="active"' : ''?>>
                <?= $this->Html->link('Build party', ['controller' => 'Units', 'action' => 'partyBalanced'])?>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!empty($this->request->session()->read('Auth.User.id'))): ?>
                <?php if ($this->request->session()->read('Auth.User.role') === 'admin'):?>
                    <li><?= $this->Html->link('<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Administration', ['controller' => 'Units', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]);?></li>
                <?php endif;?>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout ' . $this->request->session()->read('Auth.User.username'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]);?></li>
            <?php else:?>
                <li><?= $this->Html->link('<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login', ['controller' => 'Users', 'action' => 'login'], ['escape' => false]);?></li>
            <?php endif;?>
        </ul>
    </div>
</nav>