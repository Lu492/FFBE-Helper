<div class="users login row">
    <?= $this->Flash->render('auth'); ?>

    <div class="col-md-4 col-md-offset-4">
        <h2>Login</h2>
        <?php
        echo $this->Form->create(null);
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->submit('Login', ['class' => 'btn btn-success']);
        echo $this->Form->end();
        ?>
    </div>
</div>