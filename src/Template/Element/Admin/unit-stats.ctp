<fieldset>
    <legend>Stats</legend><?php
    echo $this->Form->input('hp', ['label' => ['text' => $this->Html->image('hp.png') . ' HP', 'escape' => false]]);
    echo $this->Form->input('mp', ['label' => ['text' => $this->Html->image('mp.png') . ' MP', 'escape' => false]]);
    echo $this->Form->input('atk', ['label' => ['text' => $this->Html->image('atk.png') . ' ATK', 'escape' => false]]);
    echo $this->Form->input('def', ['label' => ['text' => $this->Html->image('def.png') . ' DEF', 'escape' => false]]);
    echo $this->Form->input('mag', ['label' => ['text' => $this->Html->image('mag.png') . ' MAG', 'escape' => false]]);
    echo $this->Form->input('spr', ['label' => ['text' => $this->Html->image('spr.png') . ' SPR', 'escape' => false]]);
    echo $this->Form->input('hits');
?></fieldset>