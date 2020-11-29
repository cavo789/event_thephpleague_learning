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

namespace Avonture\Events;

use Avonture\Classes\Customer;
use Psr\EventDispatcher\StoppableEventInterface;  // Allow to prevent to run next listeners

/**
 * A new customer is being created.
 */
class NewCustomer implements StoppableEventInterface
{
    /**
     * Does the next listener can be fired? When this variable is set
     * to true, the dispatcher will stop to process listeners.
     *
     * @var bool
     */
    private $isPropagationStopped=false;

    /**
     * The customer object.
     *
     * @var Customer
     */
    private $customer;

    /**
     * Constructor.
     *
     * @param Customer $customer The new customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the customer.
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * Is propagation stopped?
     *
     * @return bool
     *              True if the Event is complete and no further listeners should be called.
     *              False to continue calling listeners.
     */
    public function isPropagationStopped(): bool
    {
        return $this->isPropagationStopped;
    }

    /**
     * Stop the propagation, tells the event's dispatcher to not process further
     * listeners.
     *
     * This method has to be called by a listener to stop the dispatcher.
     *
     * @return void
     */
    public function stopPropagation(): void
    {
        $this->isPropagationStopped = true;
    }
}
