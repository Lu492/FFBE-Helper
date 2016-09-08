<div class="search row well">
    <p>
        Search and filter available units.
        <a href="#search" class="btn btn-info btn-sm show-hide"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Show</a>
    </p>

    <div class="search-form">
        <?php echo $this->Form->create(null, ['id' => 'unitsearchform', 'url' => ['action' => 'index', 'type' => $this->request->params['type']]]);?>

        <div class='col-md-6'>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('game', ['type' => 'select', 'options' => $origins, 'empty' => 'Select origin game']);
            echo $this->Form->input('job', ['empty' => 'Select unit job']);
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('role', ['type' => 'select', 'options' => $specialisations, 'empty' => 'Select role']);
            echo $this->Rarity->form('min_rarity', null, 'stars');
            echo $this->Rarity->form('max_rarity', null, 'stars');
            ?>
        </div>

        <div class="clearfix"><!-- blank --></div>

        <?php
        echo "<div class='submit'>" . $this->Form->button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter', ['class' => 'btn btn-success', 'escape' => false]) . "</div>";

        // Hidden field for managing the Search.Prg component loading
        echo $this->Form->input('search', ['type' => 'hidden', 'value' => true]);

        echo $this->Form->end();
        echo $this->Html->link('Reset', ['action' => 'index', 'type' => $this->request->params['type']], ['class' => 'btn btn-default']);
        ?>
    </div>
</div>