<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuotationsVehiclesPictures Model
 *
 * @property \App\Model\Table\QuotationsTable|\Cake\ORM\Association\BelongsTo $Quotations
 *
 * @method \App\Model\Entity\QuotationsVehiclesPicture get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsVehiclesPicture findOrCreate($search, callable $callback = null, $options = [])
 */
class QuotationsVehiclesPicturesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('quotations_vehicles_pictures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quotations', [
            'foreignKey' => 'quotation_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('image')
            ->maxLength('image', 60)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['quotation_id'], 'Quotations'));

        return $rules;
    }
}
