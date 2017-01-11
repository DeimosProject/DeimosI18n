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
     * @param bool   $addPrefix
     *
     * @return string
     */
    protected function prefix($key, $addPrefix = true)
    {
        if (!$addPrefix)
        {
            return $key;
        }

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
     * @param array $storage
     * @param bool  $addPrefix
     */
    public final function stream(array $storage, $addPrefix = true)
    {
        foreach ($storage as $key => $item)
        {
            $this[$this->prefix($key, $addPrefix)] = $item;
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
     * @param bool $addPrefix
     *
     * @return string
     */
    public function t($key, $default = null, $addPrefix = true)
    {
        $this->load();
        $itemKey = $this->prefix($key, $addPrefix);
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