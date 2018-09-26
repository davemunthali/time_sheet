<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Donors'), ['controller' => 'Donors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Donor'), ['controller' => 'Donors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timesheets'), ['controller' => 'Timesheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timesheet'), ['controller' => 'Timesheets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Add Activity') ?></legend>
        <?php
            echo $this->Form->control('donor_id', ['options' => $donors, 'empty' => true]);
            echo $this->Form->control('timesheet_id', ['options' => $timesheets, 'empty' => true]);
            echo $this->Form->control('hours');
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
