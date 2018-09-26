<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date_of_creation
 * @property int $donor_id
 * @property float $hours
 * @property string $comment
 * @property int $user_id
 *
 * @property \App\Model\Entity\Donor $donor
 * @property \App\Model\Entity\User $user
 */
class Task extends Entity
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
        'date_of_creation' => true,
        'donor_id' => true,
        'hours' => true,
        'comment' => true,
        'user_id' => true,
        'donor' => true,
        'user' => true
    ];
}
