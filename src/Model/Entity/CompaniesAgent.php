<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompaniesAgent Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $agent_id
 * @property string $file_number
 * @property \Cake\I18n\FrozenTime $valid_from
 * @property \Cake\I18n\FrozenTime $valid_to
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Agent $agent
 */
class CompaniesAgent extends Entity
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
        'agent_id' => true,
        'file_number' => true,
        'valid_from' => true,
        'valid_to' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'agent' => true
    ];

     // Retrieve All Cities concat
    protected function _getAllCities()
    {
        $cities = "";
        
        
       foreach($this->_properties['places'] as $place):
            $cities = $cities.$place['description'].", ";

        endforeach;

        // Quito la ultima ,
        $cities = rtrim($cities, ', ');

        
        return $cities;
    }
}
