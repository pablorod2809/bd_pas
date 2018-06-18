<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompaniesVehicle Entity
 *
 * @property int $id
 * @property int $company_id
 * @property string $mark
 * @property string $model
 * @property string $version
 * @property string $vehicle_code
 *
 * @property \App\Model\Entity\Company $company
 */
class CompaniesVehicle extends Entity
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
        'company_id' => true,
        'mark' => true,
        'model' => true,
        'version' => true,
        'vehicle_code' => true,
        'company' => true
    ];

    // Retrieve full vehicle name
    protected function _getvehicle()
    {
        return $this->_properties['mark'] . ' ' . $this->_properties['model'] . ' ' . $this->_properties['version'];
    }
}
