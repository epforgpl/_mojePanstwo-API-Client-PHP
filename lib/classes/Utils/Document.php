<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/22/13
 * Time: 11:34 AM
 */

namespace MP;


class Document extends API
{
    public $requests_prefix = '/docs/';
    /**
     * ID
     * @var int
     */
    private $id = null;

    /**
     * data
     * @var array
     */
    private $data = array();

    public function __construct($id, $autoload = true)
    {
        parent::__construct();
        $this->setId($id);
        if ($autoload)
            $this->loadInfo();
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function loadInfo()
    {
        $data = $this->request($this->id);
        if ($data) {

            $this->data = $data['document']['Doc'];
            return $this->getInfo();

        }
        return false;
    }

    public function getInfo()
    {
        return $this->data;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getPagesCount()
    {
        return $this->data['pages_count'];
    }

    /**
     * @return int
     */
    public function getPackagesCount()
    {
        return $this->data['packages_count'];
    }

    public function loadHtml($package = 1)
    {
        $data = $this->request($this->id . '/html/' . $package);
        return $data['html'];
    }

    public function getCSSLocation()
    {
        return 'http://docs.sejmometr.pl/htmlex/' . $this->id . '/' . $this->id . '.css';
    }

} 