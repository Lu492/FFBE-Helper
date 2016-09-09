<div class="add-units row well">
    <p>
        Find and add new units to your collection.
        <a href="#search" class="btn btn-info btn-sm show-hide"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Show</a>
    </p>

    <div class="add-form">
        <?php
        /* @var \App\View\AppView $this */
        echo $this->Form->create(null, ['url' => ['controller' => 'Units', 'action' => 'acquire'], 'id' => 'acquire-unit']); ?>

        <div class="col-md-4">
            <?php echo $this->Form->input('unit_name', ['autocomplete' => 'off', 'help' => 'Type the first few characters of the unit to auto-complete.', 'required' => true]); ?>
            <?php echo $this->Form->input('unit_id', ['type' => 'hidden']); ?>
        </div>
        <div class="col-md-5">
            <?= $this->Rarity->form('rarity_id', null, ['required' => true]);?>
        </div>
        <div class="col-md-3">
            <?php echo $this->Form->input('level', ['type' => 'number', 'min' => 1, 'max' => 80, 'value' => 1]); ?>
        </div>
        <div class="col-md-12">
            <?php
            echo $this->Form->button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Acquire unit', ['class' => 'btn btn-primary']);
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script type="application/javascript">
    $(function () {
        $('#unit-name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/units/unit-list',
                    dataType: 'json',
                    data: {
                        q: $('#unit-name').val()
                    },
                    success: function (data) {
                        response(data.units);
                    }
                });
            },
            search: function (event, ui) {
                $('#acquire-unit div.form-group.radio label:hidden').show();
            },
            select: function (event, ui) {
                $('#unit-name').val(ui.item.label);
                $('#unit-id').val(ui.item.value);

                $('#acquire-unit div.form-group.radio label').each(function (i, e) {
                    if (parseInt($(e).attr('for').replace('rarity_id-', '')) < parseInt(ui.item.base_rarity.stars)) {
                        $(e).hide();
                    }
                    if (parseInt($(e).attr('for').replace('rarity_id-', '')) > parseInt(ui.item.max_rarity.stars)) {
                        $(e).hide();
                    }
                });

                return false;
            },
            minLength: 2
        });
    });
</script>
<?php $this->end(); ?>