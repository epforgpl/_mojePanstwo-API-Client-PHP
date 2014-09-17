<?

namespace MP\Dane;

class Budzet_wydatki_rozdzialy extends DataObject
{
	
	protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
	
    public function getLabel()
    {
        return 'Rozdział budżetu narodowego';
    }
    
    public function getPosition()
    {
	    return $this->getData('src');
    }

}