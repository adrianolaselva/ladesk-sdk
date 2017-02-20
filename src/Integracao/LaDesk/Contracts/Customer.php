<?php

namespace Integracao\LaDesk\Contracts;

/**
 * Class Customer
 * @package Integracao\LaDesk\Contracts
 */
class Customer
{
    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $customfields;

    /**
     * @var string
     */
    private $uniquefields;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Customer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Customer
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomfields()
    {
        return $this->customfields;
    }

    /**
     * @param string $customfields
     * @return Customer
     */
    public function setCustomfields($customfields)
    {
        $this->customfields = $customfields;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniquefields()
    {
        return $this->uniquefields;
    }

    /**
     * @param string $uniquefields
     * @return Customer
     */
    public function setUniquefields($uniquefields)
    {
        $this->uniquefields = $uniquefields;
        return $this;
    }

}