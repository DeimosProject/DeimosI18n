<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use Deimos\I18n\I18n;

class MI18n extends I18n
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
            'hello' => 'Привет',
            'world' => 'Мир'
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

$mi = new MI18n();

$mi->setModuleId(65);
$mi->setLinkId(841);

var_dump($mi->t('hello'));
var_dump($mi->t('world'));