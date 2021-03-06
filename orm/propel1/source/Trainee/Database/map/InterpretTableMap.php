<?php

namespace Trainee\Database\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trainee_orm_propel1_interpret' table.
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Fri 05 Sep 2014 04:15:10 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator..map
 */
class InterpretTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.InterpretTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('trainee_orm_propel1_interpret');
        $this->setPhpName('Interpret');
        $this->setClassname('Trainee\\Database\\Interpret');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 11, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 80, null);
        $this->addColumn('is_sampler', 'IsSampler', 'TINYINT', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Album', 'Trainee\\Database\\Album', RelationMap::ONE_TO_MANY, array('id' => 'interpret_id', ), null, null, 'Albums');
    } // buildRelations()

} // InterpretTableMap
