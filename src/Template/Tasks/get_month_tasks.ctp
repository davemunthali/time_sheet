<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Donors'), ['controller' => 'Donors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Donor'), ['controller' => 'Donors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks index large-9 medium-8 columns content">
    <h3><?= __('Filtered Tasks') ?></h3>
    <div>
        <?php if (!empty($tasks)) { ?>
            <table>
                <thead>
                    <th>Day</th>
                    <th>Donor</th>
                    <th>Hours</th>
                </thead>

                <tbody>
                    <?php  
                        foreach ($tasks as $key => $val) { ?> 
                            <?php 
                                $week = date('W', strtotime($val['date_of_creation'])); 
                                // $currentDay=date('D', strtotime($val['date_of_creation']));
                                // $day;
                            ?> 
                            <tr>
                                <td><?php echo date('D', strtotime($val['date_of_creation'])); ?></td>
                                <td><?php echo $val->donor['name']; ?></td>
                                <td><?php echo $val['hours']; ?></td>
                            </tr>
                    <?php } ?>
                </tbody>    
                </thead>
            </table>
        <?php } else { ?>
            <p>There are no results matching that criteria</p>
        <?php } ?>
    </div>
</div>