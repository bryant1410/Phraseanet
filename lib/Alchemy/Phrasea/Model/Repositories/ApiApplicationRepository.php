<?php

namespace Alchemy\Phrasea\Model\Repositories;

use Alchemy\Phrasea\Model\Entities\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

/**
 * ApiApplicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApiApplicationRepository extends EntityRepository
{
    public function findByClientId($clientId)
    {
        $qb = $this->createQueryBuilder('app');
        $qb->where($qb->expr()->eq('app.clientId', ':clientId'));
        $qb->setParameter(':clientId', $clientId);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findByCreator(User $user)
    {
        $qb = $this->createQueryBuilder('app');
        $qb->where($qb->expr()->eq('app.creator', ':creator'));
        $qb->setParameter(':creator', $user);

        return $qb->getQuery()->getResult();
    }

    public function findByUser(User $user)
    {
        $qb = $this->createQueryBuilder('app');
        $qb->innerJoin('app.accounts', 'acc', Expr\Join::WITH, $qb->expr()->eq('acc.user', ':user'));
        $qb->setParameter(':user', $user);

        return $qb->getQuery()->getResult();
    }

    public function findAuthorizedAppsByUser(User $user)
    {
        $qb = $this->createQueryBuilder('app');
        $qb->innerJoin('app.accounts', 'acc', Expr\Join::WITH, $qb->expr()->eq('acc.user', ':user'));
        $qb->where($qb->expr()->eq('acc.revoked', $qb->expr()->literal(false)));
        $qb->setParameter(':user', $user);

        return $qb->getQuery()->getResult();
    }
}
