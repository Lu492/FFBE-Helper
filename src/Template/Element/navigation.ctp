<nav class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li <?= ($this->request->controller === 'Units' && $this->request->action === 'index' && $this->request->params['type'] === 'all') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Units', ['controller' => 'Units', 'action' => 'index', 'type' => 'all'])?>
            </li>

            <?php if (!empty($this->request->session()->read('Auth.User.id'))) { ?>
                <li <?= ($this->request->controller === 'Units' && $this->request->action === 'index' && $this->request->params['type'] === 'acquired') ? 'class="active"' : ''?>>
                    <?= $this->Html->link('My units', ['controller' => 'Units', 'action' => 'index', 'type' => 'acquired'])?>
                </li>
            <?php } ?>

            <li <?= ($this->request->controller === 'Units' && strpos($this->request->action, 'party') !== false) ? 'class="active"' : ''?>>
                <?= $this->Html->link('Build party', ['controller' => 'Units', 'action' => 'partyBalanced'])?>
            </li>

            <?php if (empty($this->request->session()->read('Auth.User.id'))) { ?>
                <li <?= ($this->request->controller === 'Users' && $this->request->action === 'login') ? 'class="active"' : ''?>>
                    <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'])?>
                </li>
            <?php } else { ?>
                <li>
                    <?= $this->Html->link('Logout ' . $this->request->session()->read('Auth.User.username'), ['controller' => 'Users', 'action' => 'logout'])?>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>