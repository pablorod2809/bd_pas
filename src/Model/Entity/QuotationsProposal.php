<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuotationsProposal Entity
 *
 * @property int $id
 * @property int $quotation_id
 * @property string $coverage
 * @property float $price
 * @property string $contract_detail
 * @property string $contract_resume
 * @property string $hired
 * @property \Cake\I18n\FrozenTime $emission_request
 *
 * @property \App\Model\Entity\Quotation $quotation
 */
class QuotationsProposal extends Entity
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
        'coverage' => true,
        'price' => true,
        'contract_detail' => true,
        'contract_resume' => true,
        'hired' => true,
        'emission_request' => true,
        'quotation' => true
    ];
}
