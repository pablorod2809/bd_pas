<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Place Entity
 *
 * @property int $id
 * @property string $zip_code
 * @property string $description
 *
 * @property \App\Model\Entity\Agent[] $agents
 * @property \App\Model\Entity\Customer[] $customers
 */
class Place extends Entity
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
        'zip_code' => true,
        'description' => true,
        'agents' => true,
        'customers' => true
    ];
}
