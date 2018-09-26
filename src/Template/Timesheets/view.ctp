<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timesheet $timesheet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timesheet'), ['action' => 'edit', $timesheet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timesheet'), ['action' => 'delete', $timesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timesheet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timesheets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timesheet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timesheets view large-9 medium-8 columns content">
    <h3><?= h($timesheet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $timesheet->has('user') ? $this->Html->link($timesheet->user->name, ['controller' => 'Users', 'action' => 'view', $timesheet->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timesheet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($timesheet->date_created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($timesheet->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Donor Id') ?></th>
                <th scope="col"><?= __('Timesheet Id') ?></th>
                <th scope="col"><?= __('Hours') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($timesheet->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->donor_id) ?></td>
                <td><?= h($activities->timesheet_id) ?></td>
                <td><?= h($activities->hours) ?></td>
                <td><?= h($activities->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
