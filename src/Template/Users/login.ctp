<div class="users login row">
    <?= $this->Flash->render('auth'); ?>

    <div class="col-md-2 col-md-offset-5 login">
        <h2>Login</h2>
        <?php
        echo $this->Form->create(null);
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->submit('Login', ['class' => 'btn btn-success btn-block']);
        echo $this->Form->end();
        ?>
    </div>
</div>