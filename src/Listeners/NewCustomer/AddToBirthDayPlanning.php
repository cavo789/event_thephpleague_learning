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
class AddToBirthDayPlanning implements Listener
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
     * @param object $event The event
     *
     * @return void
     */
    public function __invoke(object $event): void
    {
        $this->customer = $event->getCustomer();

        \printf(
            "    == AddToBirthDayPlanning == Add %s to our Happy Birthday planning \n",
            $this->customer->getName()
        );
    }
}
