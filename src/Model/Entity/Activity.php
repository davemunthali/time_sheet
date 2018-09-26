<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $id
 * @property int $donor_id
 * @property int $timesheet_id
 * @property float $hours
 * @property string $comment
 *
 * @property \App\Model\Entity\Donor $donor
 * @property \App\Model\Entity\Timesheet $timesheet
 * @property \App\Model\Entity\Task[] $tasks
 */
class Activity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'donor_id' => true,
        'timesheet_id' => true,
        'hours' => true,
        'comment' => true,
        'donor' => true,
        'timesheet' => true,
        'tasks' => true
    ];
}
