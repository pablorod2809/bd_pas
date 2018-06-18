<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompaniesFixture
 *
 */
class CompaniesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'company_name' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ssn_cod' => ['type' => 'string', 'length' => 5, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Codigo de Registro de la compañía en la Superintendencia de Seguros de la Nación.', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'logo' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Logotipo de la compañía a ser utilizado en el broker digital y en el backoffice del PAS.', 'precision' => null, 'fixed' => null],
        'base_url' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'nombre corto con el que se identifica a la compañía en la url de ingreso al broker. ', 'precision' => null, 'fixed' => null],
        'api_base_url' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Url base de la compañía sobre la cual impactaran las llamadas de los distintos servicios del sistema.', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'company_name_UNIQUE' => ['type' => 'unique', 'columns' => ['company_name'], 'length' => []],
            'ssn_cod_UNIQUE' => ['type' => 'unique', 'columns' => ['ssn_cod'], 'length' => []],
            'base_url_UNIQUE' => ['type' => 'unique', 'columns' => ['base_url'], 'length' => []],
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
            'company_name' => 'Lorem ipsum dolor sit amet',
            'ssn_cod' => 'Lor',
            'email' => 'Lorem ipsum dolor sit amet',
            'logo' => 'Lorem ipsum dolor sit amet',
            'base_url' => 'Lorem ipsum dolor sit amet',
            'api_base_url' => 'Lorem ipsum dolor sit amet',
            'created' => '2018-01-25 17:29:41',
            'modified' => '2018-01-25 17:29:41'
        ],
    ];
}
