# League\Event - How to use

![Banner](./banner.svg)

This is a sample script repo to illustrate how to use [https://event.thephpleague.com](https://event.thephpleague.com). This repo is the answer to my question [#97](https://github.com/thephpleague/event/issues/97), on the League\Event repo.

Code is based on version 3.

This sample will simulate the creation of a new customer.

When the new customer has been set up (`name`, `email`, ...), the code will:

1. include the list of listeners for the `NewCustomer` event.
2. create an event's dispatcher instance
3. dispatch (run) the event

The real-world use case will be: when a new customer has been created, the program will send him/her a welcome email, subscribe him/her to our newsletter, if his/her birthday date has been introduced add an entry in the birthday calendar to send him/her mail with a discount f.i., ...

## Run the script

By running `php index.php` on the console, you should get this:

```text
In Avonture\Classes\Customer::__construct - A new customer has been set up.
    == SendWelcomeMessage == Congrats Albert Einstein by email (albert@emc2.uk)
    == SubscribeNewsLetter == Add Albert Einstein to our newsletter (albert@emc2.uk)
    == AddToBirthDayPlanning == Add Albert Einstein to our Happy Birthday planning
```

A new customer is created and the `NewCustomer` event is fired. There are three registered listeners (see `src/Listeners/NewCustomerSubscribers.php`) and each listener will be fired one after the other.

## Stop propagation

See the `src/Events/NewCustomer.php` event. By implementing the  `Psr\EventDispatcher\StoppableEventInterface` class, it's possible to tell to the event's dispatcher to stop propagation after having fired a given listener. This is explained in this documentation: [https://www.php-fig.org/psr/psr-14/#stoppable-events](https://www.php-fig.org/psr/psr-14/#stoppable-events).

The event should have a method called `isPropagationStopped()` that returns a boolean. As soon as the return if false, the dispatcher will stop even there are unprocessed listener in the pipeline.

Note: `StoppableEventInterface` has to be added in the `Events` definition, not in the `Listener`.

Let's try. Edit the `src/Listeners/NewCustomer/SubscribeNewsLetter.php` listener, and uncomment the `$event->stopPropagation();` line. Run the script again (`php index.php`) and you'll get this:

```text
In Avonture\Classes\Customer::__construct - A new customer has been set up.
    == SendWelcomeMessage == Congrats Albert Einstein by email (albert@emc2.uk)
    == SubscribeNewsLetter == Add Albert Einstein to our newsletter (albert@emc2.uk)
```

The `AddToBirthDayPlanning` listener wasn't called. The dispatcher has received the order to dont process next listeners.
