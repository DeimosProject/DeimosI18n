<?php

namespace Deimos\I18n;

abstract class I18n extends \ArrayObject
{

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var bool
     */
    protected $loaded;

    /**
     * @var bool
     */
    protected $isSave;

    /**
     * i18n constructor.
     *
     * @param string $prefix
     */
    public function __construct($prefix = null)
    {
        $this->prefix = $prefix;
        parent::__construct();
    }

    /**
     * @param string $key
     *
     * @return string
     */
    protected function prefix($key)
    {
        return ($this->prefix ? $this->prefix . '.' : '') . $key;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    protected function valid($key)
    {
        return isset($this[$key]);
    }

    /**
     * load data
     */
    private function load()
    {
        if (!$this->loaded)
        {
            foreach ($this->init() as $key => $value)
            {
                $this[$this->prefix($key)] = $value;
            }
            $this->loaded = true;
        }
    }

    /**
     * load data
     *
     * @return array
     */
    abstract protected function init();

    /**
     * @param string $key
     * @param string $value
     */
    abstract protected function register($key, $value);

    /**
     * @param      $key
     * @param null $default
     *
     * @return string
     */
    public function t($key, $default = null)
    {
        $this->load();
        $itemKey = $this->prefix($key);
        if (!$this->valid($itemKey))
        {
            $this[$itemKey] = $default;
            if ($this->isSave)
            {
                $this->register($itemKey, $default);
            }
        }

        return $this[$itemKey];
    }

}