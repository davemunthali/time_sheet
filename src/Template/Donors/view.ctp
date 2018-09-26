<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Donor'), ['action' => 'edit', $donor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Donor'), ['action' => 'delete', $donor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $donor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Donors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Donor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="donors view large-9 medium-8 columns content">
    <h3><?= h($donor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($donor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($donor->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($donor->tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date Of Creation') ?></th>
                <th scope="col"><?= __('Donor Id') ?></th>
                <th scope="col"><?= __('Hours') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($donor->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->id) ?></td>
                <td><?= h($tasks->date_of_creation) ?></td>
                <td><?= h($tasks->donor_id) ?></td>
                <td><?= h($tasks->hours) ?></td>
                <td><?= h($tasks->comment) ?></td>
                <td><?= h($tasks->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
