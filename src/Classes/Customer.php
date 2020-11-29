<?php

declare(strict_types = 1);

/**
 * Test League/Event package
 * This is a sample script repo to illustrate how to use https://event.thephpleague.com.
 * php version 7.2
 *
 * @package   Christophe_Events
 * @author    Christophe Avonture <cavo789@yahoo.com>
 * @license   MIT <https://opensource.org/licenses/MIT/>
 */

namespace Avonture\Classes;

/**
 * The customer class.
 */
class Customer
{
    /**
     * Email address of the customer.
     *
     * @var string
     */
    private $email = '';

    /**
     * Name of the customer.
     *
     * @var string
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param string $name  Name of the customer
     * @param string $email email address of the customer
     */
    public function __construct(string $name, string $email)
    {
        $this->setName($name);
        $this->setEmail($email);

        // Debug string
        echo 'In ' . __METHOD__ . " - A new customer has been set up.\n";
    }

    /**
     * Get the customer's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the customer's name.
     *
     * @param string $name The customer name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the customer's email.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the customer's name.
     *
     * @param string $email The customer email
     *
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
