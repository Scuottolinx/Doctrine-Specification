<?php


namespace Happyr\Doctrine\Specification\Spec;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\QueryBuilder;

/**
 * Class ParentSpecification
 *
 * Extend this abstract class if you want to build a new spec with your domain logic
 *
 * @author Tobias Nyholm
 *
 */
abstract class ParentSpecification implements Specification
{
    /**
     * @var Specification spec
     *
     */
    protected $spec;

    /**
     * @var string|null dqlAlias
     *
     */
    protected $dqlAlias;

    /**
     * @param string $dqlAlias
     */
    public function __construct($dqlAlias = null)
    {
        $this->dqlAlias = $dqlAlias;
    }

    /**
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @param string $dqlAlias
     *
     * @return \Doctrine\ORM\Query\Expr
     */
    public function match(QueryBuilder $qb, $dqlAlias)
    {
        if ($this->dqlAlias !== null) {
            $dqlAlias = $this->dqlAlias;
        }

        return $this->spec->match($qb, $dqlAlias);
    }

    /**
     * @param \Doctrine\ORM\AbstractQuery $query
     */
    public function modifyQuery(AbstractQuery $query)
    {
        $this->spec->modifyQuery($query);
    }
} 