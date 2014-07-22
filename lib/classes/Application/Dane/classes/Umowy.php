<?

namespace MP\Dane;

class Umowy extends DocDataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Umowa';
    }
	
	public function getUrl()
	{
		return 'dane/krs_podmioty/' . $this->getData('krs_id') . '/umowy/' . $this->getId();
	}
		
}