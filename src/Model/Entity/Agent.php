<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Agent Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $enrollment
 * @property string $password
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $photo
 * @property string $phone
 * @property string $address
 * @property int $place_id
 * @property string $facebook
 * @property string $token
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Place[] $places
 * @property \App\Model\Entity\Quotation[] $quotations
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\CompaniesGroup[] $companies_groups
 */
class Agent extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'enrollment' => true,
        'password' => true,
        'email' => true,
        'birthday' => true,
        'photo' => true,
        'phone' => true,
        'address' => true,
        'place_id' => true,
        'facebook' => true,
        'token' => true,
        'created' => true,
        'modified' => true,
        'places' => true,
        'quotations' => true,
        'companies' => true,
        'companies_groups' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

    // Retrieve Fullname
    protected function _getfullname()
    {
        return $this->_properties['last_name'] . ' ' . $this->_properties['first_name'];
    }


}
