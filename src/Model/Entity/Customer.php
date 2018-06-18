<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $customer_name
 * @property string $gender
 * @property string $email
 * @property int $document_type_id
 * @property string $document_number
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $phone
 * @property string $address
 * @property int $place_id
 * @property float $latitude
 * @property float $longitude
 * @property int $iva_type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DocumentsType $documents_type
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\IvaType $iva_type
 * @property \App\Model\Entity\Quotation[] $quotations
 */
class Customer extends Entity
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
        'customer_name' => true,
        'gender' => true,
        'email' => true,
        'document_type_id' => true,
        'document_number' => true,
        'birthday' => true,
        'phone' => true,
        'address' => true,
        'place_id' => true,
        'latitude' => true,
        'longitude' => true,
        'iva_type_id' => true,
        'created' => true,
        'modified' => true,
        'documents_type' => true,
        'place' => true,
        'iva_type' => true,
        'quotations' => true
    ];
}
