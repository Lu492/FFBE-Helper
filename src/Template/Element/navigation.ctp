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
            <li>
                <?php
                if (empty($this->request->session()->read('Auth.User.id'))) {
                    echo $this->Html->link('<span class="glyphicon glyphicon-share" aria-hidden="true"></span> Login', ['controller' => 'Users', 'action' => 'login'], ['escape' => false]);
                } else {
                    echo $this->Html->link('<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout ' . $this->request->session()->read('Auth.User.username'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]);
                }
                ?>
            </li>
        </ul>
    </div>
</nav>