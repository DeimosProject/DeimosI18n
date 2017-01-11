<?php

namespace DeimosTest;

class I18nSave extends \Deimos\I18n\I18n
{

    /**
     * @var bool
     */
    protected $isSave = true;

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
     */
    protected function register($key, $value)
    {
        $this[$key] = $value;
    }

}