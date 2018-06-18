<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IvaTypes Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 *
 * @method \App\Model\Entity\IvaType get($primaryKey, $options = [])
 * @method \App\Model\Entity\IvaType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IvaType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IvaType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IvaType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IvaType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IvaType findOrCreate($search, callable $callback = null, $options = [])
 */
class IvaTypesTable extends Table
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

        $this->setTable('iva_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Customers', [
            'foreignKey' => 'iva_type_id'
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
            ->scalar('description')
            ->maxLength('description', 60)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
