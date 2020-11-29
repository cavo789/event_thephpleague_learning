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

namespace Avonture;

require_once \dirname(__DIR__) . './vendor/autoload.php';

use Avonture\Classes\Customer;
use Avonture\Events\NewCustomer;
use Avonture\Listeners\NewCustomerSubscribers;
use League\Event\EventDispatcher;

// Create a new customer
$customer = new Customer('Albert Einstein', 'albert@emc2.uk');

if (\file_exists(__DIR__ . '/Listeners/NewCustomerSubscribers.php')) {
    // Register the event dispatcher
    $dispatcher = new EventDispatcher();

    // Load the subscriber class for the NewCustomer event
    $dispatcher->subscribeListenersFrom(new NewCustomerSubscribers());

    // Dispatch (run) the event, listeners will be called one by one
    $dispatcher->dispatch(new NewCustomer($customer));
}
