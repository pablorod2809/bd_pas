<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuotationsVehiclesPicture Entity
 *
 * @property int $id
 * @property int $quotation_id
 * @property string $image
 *
 * @property \App\Model\Entity\Quotation $quotation
 */
class QuotationsVehiclesPicture extends Entity
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
        'quotation_id' => true,
        'image' => true,
        'quotation' => true
    ];
}
