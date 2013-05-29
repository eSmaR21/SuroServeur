<?php
namespace Minecraft\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="minecraft_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    protected $usernameMinecraft;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usernameMinecraft
     *
     * @param string $usernameMinecraft
     * @return User
     */
    public function setUsernameMinecraft($usernameMinecraft)
    {
        $this->usernameMinecraft = $usernameMinecraft;
    
        return $this;
    }

    /**
     * Get usernameMinecraft
     *
     * @return string 
     */
    public function getUsernameMinecraft()
    {
        return $this->usernameMinecraft;
    }
}
