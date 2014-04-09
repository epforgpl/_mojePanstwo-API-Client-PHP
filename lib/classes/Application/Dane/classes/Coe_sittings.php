<?

namespace MP\Dane;

class Coe_sittings extends DataObject
{
	
	protected $schema = array(
		array('powiazania', 'Związany z'),
	);
	
    protected $routes = array(
		'date' => 'date',
	);
	
    public function getTitle()
    {
        return 'Session / ' . $this->getData('time_str');
    }

    public function getShortTitle()
    {
        return $this->getTitle();
    }

    public function getLabel()
    {
        return '<strong>Council of Europe</strong> sitting';
    }

}