<?php

namespace Base;

use \физическиеобъёмы as Childфизическиеобъёмы;
use \физическиеобъёмыQuery as ChildфизическиеобъёмыQuery;
use \Exception;
use \PDO;
use Map\физическиеобъёмыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Физические_объёмы' table.
 *
 * 
 *
 * @method     ChildфизическиеобъёмыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildфизическиеобъёмыQuery orderByдата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildфизическиеобъёмыQuery orderByучастокработ($order = Criteria::ASC) Order by the Участок_работ column
 * @method     ChildфизическиеобъёмыQuery orderByтипработ($order = Criteria::ASC) Order by the Тип_работ column
 * @method     ChildфизическиеобъёмыQuery orderByплан($order = Criteria::ASC) Order by the План column
 * @method     ChildфизическиеобъёмыQuery orderByфакт($order = Criteria::ASC) Order by the Факт column
 * @method     ChildфизическиеобъёмыQuery orderByпричинаотставания($order = Criteria::ASC) Order by the Причина_отставания column
 *
 * @method     ChildфизическиеобъёмыQuery groupById() Group by the id column
 * @method     ChildфизическиеобъёмыQuery groupByдата() Group by the Дата column
 * @method     ChildфизическиеобъёмыQuery groupByучастокработ() Group by the Участок_работ column
 * @method     ChildфизическиеобъёмыQuery groupByтипработ() Group by the Тип_работ column
 * @method     ChildфизическиеобъёмыQuery groupByплан() Group by the План column
 * @method     ChildфизическиеобъёмыQuery groupByфакт() Group by the Факт column
 * @method     ChildфизическиеобъёмыQuery groupByпричинаотставания() Group by the Причина_отставания column
 *
 * @method     ChildфизическиеобъёмыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildфизическиеобъёмыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildфизическиеобъёмыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildфизическиеобъёмыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildфизическиеобъёмыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinучасткиработ($relationAlias = null) Adds a LEFT JOIN clause to the query using the участкиработ relation
 * @method     ChildфизическиеобъёмыQuery rightJoinучасткиработ($relationAlias = null) Adds a RIGHT JOIN clause to the query using the участкиработ relation
 * @method     ChildфизическиеобъёмыQuery innerJoinучасткиработ($relationAlias = null) Adds a INNER JOIN clause to the query using the участкиработ relation
 *
 * @method     ChildфизическиеобъёмыQuery joinWithучасткиработ($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the участкиработ relation
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinWithучасткиработ() Adds a LEFT JOIN clause and with to the query using the участкиработ relation
 * @method     ChildфизическиеобъёмыQuery rightJoinWithучасткиработ() Adds a RIGHT JOIN clause and with to the query using the участкиработ relation
 * @method     ChildфизическиеобъёмыQuery innerJoinWithучасткиработ() Adds a INNER JOIN clause and with to the query using the участкиработ relation
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinКалендарь($relationAlias = null) Adds a LEFT JOIN clause to the query using the Календарь relation
 * @method     ChildфизическиеобъёмыQuery rightJoinКалендарь($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Календарь relation
 * @method     ChildфизическиеобъёмыQuery innerJoinКалендарь($relationAlias = null) Adds a INNER JOIN clause to the query using the Календарь relation
 *
 * @method     ChildфизическиеобъёмыQuery joinWithКалендарь($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Календарь relation
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinWithКалендарь() Adds a LEFT JOIN clause and with to the query using the Календарь relation
 * @method     ChildфизическиеобъёмыQuery rightJoinWithКалендарь() Adds a RIGHT JOIN clause and with to the query using the Календарь relation
 * @method     ChildфизическиеобъёмыQuery innerJoinWithКалендарь() Adds a INNER JOIN clause and with to the query using the Календарь relation
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinтипыработ($relationAlias = null) Adds a LEFT JOIN clause to the query using the типыработ relation
 * @method     ChildфизическиеобъёмыQuery rightJoinтипыработ($relationAlias = null) Adds a RIGHT JOIN clause to the query using the типыработ relation
 * @method     ChildфизическиеобъёмыQuery innerJoinтипыработ($relationAlias = null) Adds a INNER JOIN clause to the query using the типыработ relation
 *
 * @method     ChildфизическиеобъёмыQuery joinWithтипыработ($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the типыработ relation
 *
 * @method     ChildфизическиеобъёмыQuery leftJoinWithтипыработ() Adds a LEFT JOIN clause and with to the query using the типыработ relation
 * @method     ChildфизическиеобъёмыQuery rightJoinWithтипыработ() Adds a RIGHT JOIN clause and with to the query using the типыработ relation
 * @method     ChildфизическиеобъёмыQuery innerJoinWithтипыработ() Adds a INNER JOIN clause and with to the query using the типыработ relation
 *
 * @method     \участкиработQuery|\КалендарьQuery|\типыработQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childфизическиеобъёмы findOne(ConnectionInterface $con = null) Return the first Childфизическиеобъёмы matching the query
 * @method     Childфизическиеобъёмы findOneOrCreate(ConnectionInterface $con = null) Return the first Childфизическиеобъёмы matching the query, or a new Childфизическиеобъёмы object populated from the query conditions when no match is found
 *
 * @method     Childфизическиеобъёмы findOneById(int $id) Return the first Childфизическиеобъёмы filtered by the id column
 * @method     Childфизическиеобъёмы findOneByдата(string $Дата) Return the first Childфизическиеобъёмы filtered by the Дата column
 * @method     Childфизическиеобъёмы findOneByучастокработ(int $Участок_работ) Return the first Childфизическиеобъёмы filtered by the Участок_работ column
 * @method     Childфизическиеобъёмы findOneByтипработ(int $Тип_работ) Return the first Childфизическиеобъёмы filtered by the Тип_работ column
 * @method     Childфизическиеобъёмы findOneByплан(double $План) Return the first Childфизическиеобъёмы filtered by the План column
 * @method     Childфизическиеобъёмы findOneByфакт(double $Факт) Return the first Childфизическиеобъёмы filtered by the Факт column
 * @method     Childфизическиеобъёмы findOneByпричинаотставания(string $Причина_отставания) Return the first Childфизическиеобъёмы filtered by the Причина_отставания column *

 * @method     Childфизическиеобъёмы requirePk($key, ConnectionInterface $con = null) Return the Childфизическиеобъёмы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOne(ConnectionInterface $con = null) Return the first Childфизическиеобъёмы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childфизическиеобъёмы requireOneById(int $id) Return the first Childфизическиеобъёмы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByдата(string $Дата) Return the first Childфизическиеобъёмы filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByучастокработ(int $Участок_работ) Return the first Childфизическиеобъёмы filtered by the Участок_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByтипработ(int $Тип_работ) Return the first Childфизическиеобъёмы filtered by the Тип_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByплан(double $План) Return the first Childфизическиеобъёмы filtered by the План column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByфакт(double $Факт) Return the first Childфизическиеобъёмы filtered by the Факт column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childфизическиеобъёмы requireOneByпричинаотставания(string $Причина_отставания) Return the first Childфизическиеобъёмы filtered by the Причина_отставания column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childфизическиеобъёмы[]|ObjectCollection find(ConnectionInterface $con = null) Return Childфизическиеобъёмы objects based on current ModelCriteria
 * @method     Childфизическиеобъёмы[]|ObjectCollection findById(int $id) Return Childфизическиеобъёмы objects filtered by the id column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByдата(string $Дата) Return Childфизическиеобъёмы objects filtered by the Дата column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByучастокработ(int $Участок_работ) Return Childфизическиеобъёмы objects filtered by the Участок_работ column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByтипработ(int $Тип_работ) Return Childфизическиеобъёмы objects filtered by the Тип_работ column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByплан(double $План) Return Childфизическиеобъёмы objects filtered by the План column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByфакт(double $Факт) Return Childфизическиеобъёмы objects filtered by the Факт column
 * @method     Childфизическиеобъёмы[]|ObjectCollection findByпричинаотставания(string $Причина_отставания) Return Childфизическиеобъёмы objects filtered by the Причина_отставания column
 * @method     Childфизическиеобъёмы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class физическиеобъёмыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\физическиеобъёмыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\физическиеобъёмы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildфизическиеобъёмыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildфизическиеобъёмыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildфизическиеобъёмыQuery) {
            return $criteria;
        }
        $query = new ChildфизическиеобъёмыQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Childфизическиеобъёмы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = физическиеобъёмыTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(физическиеобъёмыTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return Childфизическиеобъёмы A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Дата, Участок_работ, Тип_работ, План, Факт, Причина_отставания FROM Физические_объёмы WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var Childфизическиеобъёмы $obj */
            $obj = new Childфизическиеобъёмы();
            $obj->hydrate($row);
            физическиеобъёмыTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return Childфизическиеобъёмы|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByдата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
     * </code>
     *
     * @param     mixed $�ата The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByдата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the Участок_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByучастокработ(1234); // WHERE Участок_работ = 1234
     * $query->filterByучастокработ(array(12, 34)); // WHERE Участок_работ IN (12, 34)
     * $query->filterByучастокработ(array('min' => 12)); // WHERE Участок_работ > 12
     * </code>
     *
     * @see       filterByучасткиработ()
     *
     * @param     mixed $�частокработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByучастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ, $comparison);
    }

    /**
     * Filter the query on the Тип_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByтипработ(1234); // WHERE Тип_работ = 1234
     * $query->filterByтипработ(array(12, 34)); // WHERE Тип_работ IN (12, 34)
     * $query->filterByтипработ(array('min' => 12)); // WHERE Тип_работ > 12
     * </code>
     *
     * @see       filterByтипыработ()
     *
     * @param     mixed $�ипработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByтипработ($�ипработ = null, $comparison = null)
    {
        if (is_array($�ипработ)) {
            $useMinMax = false;
            if (isset($�ипработ['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $�ипработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ипработ['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $�ипработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $�ипработ, $comparison);
    }

    /**
     * Filter the query on the План column
     *
     * Example usage:
     * <code>
     * $query->filterByплан(1234); // WHERE План = 1234
     * $query->filterByплан(array(12, 34)); // WHERE План IN (12, 34)
     * $query->filterByплан(array('min' => 12)); // WHERE План > 12
     * </code>
     *
     * @param     mixed $�лан The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByплан($�лан = null, $comparison = null)
    {
        if (is_array($�лан)) {
            $useMinMax = false;
            if (isset($�лан['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ПЛАН, $�лан['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лан['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ПЛАН, $�лан['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ПЛАН, $�лан, $comparison);
    }

    /**
     * Filter the query on the Факт column
     *
     * Example usage:
     * <code>
     * $query->filterByфакт(1234); // WHERE Факт = 1234
     * $query->filterByфакт(array(12, 34)); // WHERE Факт IN (12, 34)
     * $query->filterByфакт(array('min' => 12)); // WHERE Факт > 12
     * </code>
     *
     * @param     mixed $�акт The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByфакт($�акт = null, $comparison = null)
    {
        if (is_array($�акт)) {
            $useMinMax = false;
            if (isset($�акт['min'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ФАКТ, $�акт['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�акт['max'])) {
                $this->addUsingAlias(физическиеобъёмыTableMap::COL_ФАКТ, $�акт['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ФАКТ, $�акт, $comparison);
    }

    /**
     * Filter the query on the Причина_отставания column
     *
     * Example usage:
     * <code>
     * $query->filterByпричинаотставания('fooValue');   // WHERE Причина_отставания = 'fooValue'
     * $query->filterByпричинаотставания('%fooValue%'); // WHERE Причина_отставания LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ричинаотставания The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByпричинаотставания($�ричинаотставания = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ричинаотставания)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ричинаотставания)) {
                $�ричинаотставания = str_replace('*', '%', $�ричинаотставания);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(физическиеобъёмыTableMap::COL_ПРИЧИНА_ОТСТАВАНИЯ, $�ричинаотставания, $comparison);
    }

    /**
     * Filter the query by a related \участкиработ object
     *
     * @param \участкиработ|ObjectCollection $�часткиработ The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByучасткиработ($�часткиработ, $comparison = null)
    {
        if ($�часткиработ instanceof \участкиработ) {
            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработ->getId(), $comparison);
        } elseif ($�часткиработ instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработ->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByучасткиработ() only accepts arguments of type \участкиработ or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the участкиработ relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function joinучасткиработ($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('участкиработ');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'участкиработ');
        }

        return $this;
    }

    /**
     * Use the участкиработ relation участкиработ object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \участкиработQuery A secondary query class using the current class as primary query
     */
    public function useучасткиработQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinучасткиработ($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'участкиработ', '\участкиработQuery');
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByКалендарь($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_ДАТА, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_ДАТА, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарь() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Календарь relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function joinКалендарь($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Календарь');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Календарь');
        }

        return $this;
    }

    /**
     * Use the Календарь relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарь($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Календарь', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \типыработ object
     *
     * @param \типыработ|ObjectCollection $�ипыработ The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByтипыработ($�ипыработ, $comparison = null)
    {
        if ($�ипыработ instanceof \типыработ) {
            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $�ипыработ->getId(), $comparison);
        } elseif ($�ипыработ instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $�ипыработ->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByтипыработ() only accepts arguments of type \типыработ or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the типыработ relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function joinтипыработ($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('типыработ');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'типыработ');
        }

        return $this;
    }

    /**
     * Use the типыработ relation типыработ object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \типыработQuery A secondary query class using the current class as primary query
     */
    public function useтипыработQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinтипыработ($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'типыработ', '\типыработQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childфизическиеобъёмы $�изическиеобъёмы Object to remove from the list of results
     *
     * @return $this|ChildфизическиеобъёмыQuery The current query, for fluid interface
     */
    public function prune($�изическиеобъёмы = null)
    {
        if ($�изическиеобъёмы) {
            $this->addUsingAlias(физическиеобъёмыTableMap::COL_ID, $�изическиеобъёмы->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Физические_объёмы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(физическиеобъёмыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            физическиеобъёмыTableMap::clearInstancePool();
            физическиеобъёмыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(физическиеобъёмыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(физическиеобъёмыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            физическиеобъёмыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            физическиеобъёмыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // физическиеобъёмыQuery
