<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $description
 * @property int $order
 * @property string $question_type
 * @property string $api_key
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\QuotationsAnswer[] $quotations_answers
 * @property \App\Model\Entity\Company[] $companies
 */
class Question extends Entity
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
        'description' => true,
        'order' => true,
        'question_type' => true,
        'api_key' => true,
        'created' => true,
        'modified' => true,
        'answers' => true,
        'quotations_answers' => true,
        'companies' => true
    ];
}
