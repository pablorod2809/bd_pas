<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompaniesAgentsFixture
 *
 */
class CompaniesAgentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'company_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Identificador de la compañia en la tabla Companies', 'precision' => null, 'autoIncrement' => null],
        'agent_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Identificador del PAS en la tabla Agents.', 'precision' => null, 'autoIncrement' => null],
        'file_number' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Legajo del empleado/agente en la compañia', 'precision' => null, 'fixed' => null],
        'valid_from' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Vigencia Desde la que el agente puede operar en el sistema para la compañía correspondiente.', 'precision' => null],
        'valid_to' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Vigencia Hasta la que el agente puede operar en el sistema para la compañía dada.', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'acy_cpy_fk_idx' => ['type' => 'index', 'columns' => ['company_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cat_uk' => ['type' => 'unique', 'columns' => ['agent_id', 'company_id'], 'length' => []],
            'file_number_UNIQUE' => ['type' => 'unique', 'columns' => ['company_id', 'file_number'], 'length' => []],
            'cpa_agt_fk' => ['type' => 'foreign', 'columns' => ['agent_id'], 'references' => ['agents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'cpa_cpy_fk' => ['type' => 'foreign', 'columns' => ['company_id'], 'references' => ['companies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'company_id' => 1,
            'agent_id' => 1,
            'file_number' => 'Lorem ipsum dolor sit amet',
            'valid_from' => '2018-01-25 17:29:48',
            'valid_to' => '2018-01-25 17:29:48',
            'created' => '2018-01-25 17:29:48',
            'modified' => '2018-01-25 17:29:48'
        ],
    ];
}
