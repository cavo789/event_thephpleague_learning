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

namespace Avonture\Listeners;

use Avonture\Events\NewCustomer;
use Avonture\Listeners\NewCustomer\AddToBirthDayPlanning;
use Avonture\Listeners\NewCustomer\SendWelcomeMessage;
use Avonture\Listeners\NewCustomer\SubscribeNewsLetter;
use League\Event\ListenerRegistry;
use League\Event\ListenerSubscriber;

/**
 * Listeners for the NewCustomer event.
 *
 * Just add new listeners in the subscribeListeners() method below.
 * The listeners will be fired in the order they appear in the list.
 */
class NewCustomerSubscribers implements ListenerSubscriber
{
    /**
     * Subscribe listeners.
     *
     * @param ListenerRegistry $listenerRegistry The listener subscriber
     *
     * @return void
     */
    public function subscribeListeners(ListenerRegistry $listenerRegistry): void
    {
        $listenerRegistry->subscribeTo(NewCustomer::class, new SendWelcomeMessage());
        $listenerRegistry->subscribeTo(NewCustomer::class, new SubscribeNewsLetter());
        $listenerRegistry->subscribeTo(NewCustomer::class, new AddToBirthDayPlanning());
    }
}
