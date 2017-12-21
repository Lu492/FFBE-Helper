<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users login row">
    <?= $this->Flash->render('auth'); ?>

    <div class="col-md-4 col-md-offset-4 login">
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