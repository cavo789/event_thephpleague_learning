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

namespace Avonture\Listeners\NewCustomer;

use Avonture\Classes\Customer;
use League\Event\Listener;

/**
 * Send a welcome email to the new customer.
 */
class SendWelcomeMessage implements Listener
{
    /**
     * The new customer.
     *
     * @var Customer;
     */
    private $customer;

    /**
     * Handle the event.
     *
     * @param object $eventNewCustomer The NewCustomer event
     *
     * @return void
     */
    public function __invoke(object $eventNewCustomer): void
    {
        $this->customer = $eventNewCustomer->getCustomer();

        \printf(
            "    == SendWelcomeMessage == Congrats %s by email (%s) \n",
            $this->customer->getName(),
            $this->customer->getEmail()
        );
    }
}
