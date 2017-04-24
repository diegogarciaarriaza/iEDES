<?php

namespace iedes\webBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class UsuariosRepository extends EntityRepository implements UserProviderInterface{
    public function loadUserByUsername($username) {
        return $this->getEntityManager()
            ->createQuery('SELECT u FROM
            iedeswebBundle:Usuarios u
            WHERE (u.nick = :username
            OR u.email = :username)
            AND u.activo = true')
            ->setParameters(array(
                       'username' => $username
                        ))
            ->getOneOrNullResult();
    }

    public function refreshUser(UserInterface $user) {
        return $this->loadUserByUsername($user->getNick());
    }

    public function supportsClass($class) {
        return $class === 'iedes\webBundle\Entity\Usuarios';
    }

}
