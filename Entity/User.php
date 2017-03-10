<?php

namespace Nligo\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author  coffey  <coffey@nligo.com>
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Nligo\UserBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",options={"comment":"userId"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true,name="username",options={"comment":"username"})
     */
    private $username = "";

    /**
     * @ORM\Column(type="string",name="nickname",options={"comment":"user_nickname"})
     */
    private $nickname = "";

    /**
     * @ORM\Column(type="string",name="password",options={"comment":"user_password"})
     */
    private $password;

    /**
     * @ORM\Column(type="string",name="email",nullable=true,options={"comment":"user_email"})
     */
    private $email = "";


    /**
     * @ORM\Column(type="json_array",name="roles",options={"comment":"user_roles"})
     */
    private $roles = array();

    /**
     * @var integer
     * @ORM\Column(type="integer",name="create_at",options={"comment":"user_createAt"})
     */
    public $createAt = "0";


    /**
     * @ORM\PrePersist
     */
    public function PrePersist()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }

    /**
     * @param String
     */
    public function setRole($role)
    {
        $this->roles[] = $role;
    }

    /**
     * @param array
     */
    public function setRoles(array $roles)
    {
        $this->roles = (array)$roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at http://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one
        return;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createAt
     *
     * @param integer $createAt
     *
     * @return User
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return integer
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }
}
