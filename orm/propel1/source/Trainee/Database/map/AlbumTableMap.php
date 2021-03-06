<?php

namespace Trainee\Database\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trainee_orm_propel1_album' table.
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
class AlbumTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.AlbumTableMap';

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
        $this->setName('trainee_orm_propel1_album');
        $this->setPhpName('Album');
        $this->setClassname('Trainee\\Database\\Album');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 11, null);
        $this->addForeignPrimaryKey('interpret_id', 'InterpretId', 'INTEGER' , 'trainee_orm_propel1_interpret', 'id', true, 11, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 40, null);
        $this->addColumn('number_of_tracks', 'NumberOfTracks', 'TINYINT', true, 2, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Interpret', 'Trainee\\Database\\Interpret', RelationMap::MANY_TO_ONE, array('interpret_id' => 'id', ), null, null);
    } // buildRelations()

} // AlbumTableMap
