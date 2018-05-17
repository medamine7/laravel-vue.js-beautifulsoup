<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Subscribers extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Subscriber::count();
        $string = 'Subscribers';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-ticket',
            'title'  => "{$count} {$string}",
            'text'   => 'You have '.$count.' '.Str::lower($string).' in your database. Click on button below to view them all.',
            'button' => [
                'text' => "Subscribers",
                'link' => route('voyager.subscribers.index'),
            ],
            'image' => '/widgets-backgrounds/crowd.png',
        ]));
    }
}
