<?php

namespace DeimosTest;

class I18nPrefix extends \Deimos\I18n\I18n
{

    /**
     * @return array
     */
    protected function init()
    {
        return [
            'hello' => 'привет',
            'world' => 'мир'
        ];
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @throws \InvalidArgumentException
     */
    protected function register($key, $value)
    {
        // TODO: Implement register() method.
        throw new \InvalidArgumentException();
    }

}