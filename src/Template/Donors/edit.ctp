<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $donor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $donor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Donors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="donors form large-9 medium-8 columns content">
    <?= $this->Form->create($donor) ?>
    <fieldset>
        <legend><?= __('Edit Donor') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
