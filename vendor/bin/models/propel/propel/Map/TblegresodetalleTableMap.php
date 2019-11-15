<?php

namespace propel\propel\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use propel\propel\Tblegresodetalle;
use propel\propel\TblegresodetalleQuery;


/**
 * This class defines the structure of the 'tblegresodetalle' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblegresodetalleTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'propel.propel.Map.TblegresodetalleTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblegresodetalle';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\propel\\propel\\Tblegresodetalle';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'propel.propel.Tblegresodetalle';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the egresoDetalleId field
     */
    const COL_EGRESODETALLEID = 'tblegresodetalle.egresoDetalleId';

    /**
     * the column name for the egresoId field
     */
    const COL_EGRESOID = 'tblegresodetalle.egresoId';

    /**
     * the column name for the productoId field
     */
    const COL_PRODUCTOID = 'tblegresodetalle.productoId';

    /**
     * the column name for the cantidad field
     */
    const COL_CANTIDAD = 'tblegresodetalle.cantidad';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Egresodetalleid', 'Egresoid', 'Productoid', 'Cantidad', ),
        self::TYPE_CAMELNAME     => array('egresodetalleid', 'egresoid', 'productoid', 'cantidad', ),
        self::TYPE_COLNAME       => array(TblegresodetalleTableMap::COL_EGRESODETALLEID, TblegresodetalleTableMap::COL_EGRESOID, TblegresodetalleTableMap::COL_PRODUCTOID, TblegresodetalleTableMap::COL_CANTIDAD, ),
        self::TYPE_FIELDNAME     => array('egresoDetalleId', 'egresoId', 'productoId', 'cantidad', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Egresodetalleid' => 0, 'Egresoid' => 1, 'Productoid' => 2, 'Cantidad' => 3, ),
        self::TYPE_CAMELNAME     => array('egresodetalleid' => 0, 'egresoid' => 1, 'productoid' => 2, 'cantidad' => 3, ),
        self::TYPE_COLNAME       => array(TblegresodetalleTableMap::COL_EGRESODETALLEID => 0, TblegresodetalleTableMap::COL_EGRESOID => 1, TblegresodetalleTableMap::COL_PRODUCTOID => 2, TblegresodetalleTableMap::COL_CANTIDAD => 3, ),
        self::TYPE_FIELDNAME     => array('egresoDetalleId' => 0, 'egresoId' => 1, 'productoId' => 2, 'cantidad' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('tblegresodetalle');
        $this->setPhpName('Tblegresodetalle');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\propel\\propel\\Tblegresodetalle');
        $this->setPackage('propel.propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('egresoDetalleId', 'Egresodetalleid', 'BIGINT', true, null, null);
        $this->addForeignKey('egresoId', 'Egresoid', 'BIGINT', 'tblegreso', 'egresoId', false, null, null);
        $this->addForeignKey('productoId', 'Productoid', 'BIGINT', 'tblproductos', 'productoId', false, null, null);
        $this->addColumn('cantidad', 'Cantidad', 'DECIMAL', false, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblegreso', '\\propel\\propel\\Tblegreso', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':egresoId',
    1 => ':egresoId',
  ),
), null, null, null, false);
        $this->addRelation('Tblproductos', '\\propel\\propel\\Tblproductos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Egresodetalleid', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TblegresodetalleTableMap::CLASS_DEFAULT : TblegresodetalleTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Tblegresodetalle object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblegresodetalleTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblegresodetalleTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblegresodetalleTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblegresodetalleTableMap::OM_CLASS;
            /** @var Tblegresodetalle $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblegresodetalleTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TblegresodetalleTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblegresodetalleTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblegresodetalle $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblegresodetalleTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TblegresodetalleTableMap::COL_EGRESODETALLEID);
            $criteria->addSelectColumn(TblegresodetalleTableMap::COL_EGRESOID);
            $criteria->addSelectColumn(TblegresodetalleTableMap::COL_PRODUCTOID);
            $criteria->addSelectColumn(TblegresodetalleTableMap::COL_CANTIDAD);
        } else {
            $criteria->addSelectColumn($alias . '.egresoDetalleId');
            $criteria->addSelectColumn($alias . '.egresoId');
            $criteria->addSelectColumn($alias . '.productoId');
            $criteria->addSelectColumn($alias . '.cantidad');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TblegresodetalleTableMap::DATABASE_NAME)->getTable(TblegresodetalleTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblegresodetalleTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblegresodetalleTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblegresodetalleTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblegresodetalle or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblegresodetalle object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresodetalleTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \propel\propel\Tblegresodetalle) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblegresodetalleTableMap::DATABASE_NAME);
            $criteria->add(TblegresodetalleTableMap::COL_EGRESODETALLEID, (array) $values, Criteria::IN);
        }

        $query = TblegresodetalleQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblegresodetalleTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblegresodetalleTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblegresodetalle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblegresodetalleQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblegresodetalle or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblegresodetalle object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresodetalleTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblegresodetalle object
        }

        if ($criteria->containsKey(TblegresodetalleTableMap::COL_EGRESODETALLEID) && $criteria->keyContainsValue(TblegresodetalleTableMap::COL_EGRESODETALLEID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblegresodetalleTableMap::COL_EGRESODETALLEID.')');
        }


        // Set the correct dbName
        $query = TblegresodetalleQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblegresodetalleTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblegresodetalleTableMap::buildTableMap();
