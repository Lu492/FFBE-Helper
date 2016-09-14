<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <?= $this->Html->css(['admin']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
    <div class="container-fluid" id="content">
        <div class="row">
            <?= $this->Flash->render() ?>
            <div class="col-md-2">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
                <nav>
                    <ul class="nav nav-pills nav-stacked">
                        <li <?= ($this->request->controller === 'Units')? 'class="active"' : ''?>>
                            <?= $this->Html->link('Units', ['controller' => 'Units', 'action' => 'index']);?>
                        </li>
                        <li><?= $this->Html->link('Back to site', '/');?></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-10">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <?= $this->fetch('script') ?>
</body>
</html>
