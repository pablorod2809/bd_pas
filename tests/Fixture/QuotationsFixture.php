<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuotationsFixture
 *
 */
class QuotationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'agent_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'company_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'contact_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Fecha en la que se realizo la primer cotización por parte del cliente.', 'precision' => null],
        'company_vehicle_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'Identificador del vehiculo del cliente.', 'precision' => null, 'autoIncrement' => null],
        'vehicle_model' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Modelo del vehículo del cliente en formato YYYY', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'qtn_agt_fk_idx' => ['type' => 'index', 'columns' => ['agent_id'], 'length' => []],
            'qtn_ctr_fk_idx' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'qtn_cpy_fk_idx' => ['type' => 'index', 'columns' => ['company_id'], 'length' => []],
            'qtn_cve_fk_idx' => ['type' => 'index', 'columns' => ['company_vehicle_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'qtn_agt_fk' => ['type' => 'foreign', 'columns' => ['agent_id'], 'references' => ['agents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'qtn_cpy_fk' => ['type' => 'foreign', 'columns' => ['company_id'], 'references' => ['companies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'qtn_ctr_fk' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'qtn_cve_fk' => ['type' => 'foreign', 'columns' => ['company_vehicle_id'], 'references' => ['companies_vehicles', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'agent_id' => 1,
            'customer_id' => 1,
            'company_id' => 1,
            'contact_date' => '2018-01-26 12:50:56',
            'company_vehicle_id' => 1,
            'vehicle_model' => 1,
            'created' => '2018-01-26 12:50:56',
            'modified' => '2018-01-26 12:50:56'
        ],
    ];
}
