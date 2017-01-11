<?php

namespace DeimosTest;

class I18n extends \Deimos\I18n\I18n
{

    /**
     * @var int
     */
    protected $moduleId;

    /**
     * @var int
     */
    protected $linkId;

    /**
     * @param $value
     */
    public function setModuleId($value)
    {
        $this->moduleId = $value;
    }

    /**
     * @param $value
     */
    public function setLinkId($value)
    {
        $this->linkId = $value;
    }

    /**
     * @return array
     */
    protected function init()
    {
        $this->prefix = $this->moduleId . '.' . $this->linkId;

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