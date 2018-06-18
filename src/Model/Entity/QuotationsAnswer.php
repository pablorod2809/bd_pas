<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuotationsAnswer Entity
 *
 * @property int $id
 * @property int $quotation_id
 * @property int $question_id
 * @property int $answer_id
 * @property string $value
 *
 * @property \App\Model\Entity\Quotation $quotation
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Answer $answer
 */
class QuotationsAnswer extends Entity
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
        'question_id' => true,
        'answer_id' => true,
        'value' => true,
        'quotation' => true,
        'question' => true,
        'answer' => true
    ];
}
