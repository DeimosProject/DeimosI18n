<?php

namespace Test;

use DeimosTest\I18n;
use DeimosTest\I18nSave;
use DeimosTest\I18nPrefix;

class I18nTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var I18n
     */
    protected $i18n;

    /**
     * @var I18nPrefix
     */
    protected $i18nWithoutPrefix;

    /**
     * @var I18nPrefix
     */
    protected $i18nPrefix;

    /**
     * @var I18nSave
     */
    protected $i18nSave;

    public function setUp()
    {
        $this->i18n = new I18n();

        $this->i18n->setModuleId(65);
        $this->i18n->setLinkId(841);

        $this->i18nWithoutPrefix = new I18nPrefix();
        $this->i18nPrefix        = new I18nPrefix('default');
        $this->i18nSave          = new I18nSave();
    }

    public function testI18n()
    {
        $this->assertEquals($this->i18n->t('hello'), 'привет');
        $this->assertEquals($this->i18n->t('world'), 'мир');
        $this->assertEquals($this->i18n->t('deimos', 'деймос'), 'деймос');
    }

    public function testI18nWithoutPrefix()
    {
        $this->assertEquals($this->i18nWithoutPrefix->t('hello'), 'привет');
        $this->assertEquals($this->i18nWithoutPrefix->t('world'), 'мир');
        $this->assertEquals($this->i18nWithoutPrefix->t('deimos', 'деймос'), 'деймос');
    }

    public function testI18nPrefix()
    {
        $this->assertEquals($this->i18nPrefix->t('hello'), 'привет');
        $this->assertEquals($this->i18nPrefix->t('world'), 'мир');
        $this->assertEquals($this->i18nPrefix->t('deimos', 'деймос'), 'деймос');
    }

    public function testI18nSave()
    {
        $this->assertEquals($this->i18nSave->t('hello'), 'привет');
        $this->assertEquals($this->i18nSave->t('world'), 'мир');
        $this->assertEquals($this->i18nSave->t('deimos', 'деймос'), 'деймос');
    }

}