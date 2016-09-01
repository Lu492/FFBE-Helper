<fieldset>
    <legend>Stats</legend><?php
    echo $this->Form->input('hp', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('hp.png') . ' HP', 'escape' => false]]);
    echo $this->Form->input('mp', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('mp.png') . ' MP', 'escape' => false]]);
    echo $this->Form->input('atk', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('atk.png') . ' ATK', 'escape' => false]]);
    echo $this->Form->input('def', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('def.png') . ' DEF', 'escape' => false]]);
    echo $this->Form->input('mag', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('mag.png') . ' MAG', 'escape' => false]]);
    echo $this->Form->input('spr', ['type' => 'number', 'min' => 1, 'label' => ['text' => $this->Html->image('spr.png') . ' SPR', 'escape' => false]]);
    echo $this->Form->input('hits');
?></fieldset>