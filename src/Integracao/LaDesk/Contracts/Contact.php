<?php

namespace Integracao\LaDesk\Contracts;

/**
 * Class Contact
 * @package Integracao\LaDesk\Contracts
 */
class Contact implements \Serializable
{
    /**
     * @var integer
     */
    private $contactid;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $systemname;

    /**
     * @var string
     */
    private $authtoken;

    /**
     * @var string
     */
    private $browsercookiename;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var integer
     */
    private $companyid;

    /**
     * @var integer
     */
    private $userid;

    /**
     * @var \DateTime
     */
    private $datecreated;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $customfields;

    /**
     * @var string
     */
    private $uniquefields;

    /**
     * Contact constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return int
     */
    public function getContactid()
    {
        return $this->contactid;
    }

    /**
     * @param int $contactid
     * @return Contact
     */
    public function setContactid($contactid)
    {
        $this->contactid = $contactid;
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
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Contact
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getSystemname()
    {
        return $this->systemname;
    }

    /**
     * @param string $systemname
     * @return Contact
     */
    public function setSystemname($systemname)
    {
        $this->systemname = $systemname;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthtoken()
    {
        return $this->authtoken;
    }

    /**
     * @param string $authtoken
     * @return Contact
     */
    public function setAuthtoken($authtoken)
    {
        $this->authtoken = $authtoken;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrowsercookiename()
    {
        return $this->browsercookiename;
    }

    /**
     * @param string $browsercookiename
     * @return Contact
     */
    public function setBrowsercookiename($browsercookiename)
    {
        $this->browsercookiename = $browsercookiename;
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
     * @return Contact
     */
    public function setRole($role)
    {
        $this->role = $role;
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
     * @return Contact
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }

    /**
     * @param int $companyid
     * @return Contact
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     * @return Contact
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * @param \DateTime $datecreated
     * @return Contact
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return Contact
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return array
     */
    public function getCustomfields()
    {
        return $this->customfields;
    }

    /**
     * @param array $customfields
     * @return Contact
     */
    public function setCustomfields($customfields)
    {
        $this->customfields = $customfields;
        return $this;
    }

    /**
     * @return array
     */
    public function getUniquefields()
    {
        return $this->uniquefields;
    }

    /**
     * @param array $uniquefields
     * @return Contact
     */
    public function setUniquefields($uniquefields)
    {
        $this->uniquefields = $uniquefields;
        return $this;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }


}