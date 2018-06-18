<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $ssn_cod
 * @property string $email
 * @property string $logo
 * @property string $base_url
 * @property string $api_base_url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CompaniesAd[] $companies_ads
 * @property \App\Model\Entity\CompaniesGroup[] $companies_groups
 * @property \App\Model\Entity\CompaniesParameter[] $companies_parameters
 * @property \App\Model\Entity\CompaniesVehicle[] $companies_vehicles
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Quotation[] $quotations
 * @property \App\Model\Entity\Agent[] $agents
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Question[] $questions
 */
class Company extends Entity
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
        'company_name' => true,
        'ssn_cod' => true,
        'email' => true,
        'logo' => true,
        'base_url' => true,
        'api_base_url' => true,
        'created' => true,
        'modified' => true,
        'companies_ads' => true,
        'companies_groups' => true,
        'companies_parameters' => true,
        'companies_vehicles' => true,
        'employees' => true,
        'quotations' => true,
        'agents' => true,
        'answers' => true,
        'questions' => true
    ];
}
