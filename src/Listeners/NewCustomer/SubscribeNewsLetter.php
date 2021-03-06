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

use \Avonture\Classes\Customer;
use League\Event\Listener;

/**
 * Add the customer to our newsletter.
 */
class SubscribeNewsLetter implements Listener
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
            "    == SubscribeNewsLetter == Add %s to our newsletter (%s) \n",
            $this->customer->getName(),
            $this->customer->getEmail()
        );

        // Due to this stop, the AddToBirthDayPlanning listener will never be called
        // $event->stopPropagation();
    }
}
