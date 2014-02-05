<?

namespace MP\Dane;

class Rady_posiedzenia extends DocDataObject
{
	
	protected $schema = array(
		array('numer', 'Numer posiedzenia'),
		array('gminy.rada_nazwa', 'Rada', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gmina_id',
			),
		)),
		array('liczba_debat', 'Liczba debat', 'integer'),
	);
	
    protected $routes = array(
        'title' => 'numer',
        'shortTitle' => 'numer',
        'date' => 'data',
    );
    
    protected $hl_fields = array(
    	'gminy.rada_nazwa', 'numer', 'liczba_debat',
    );

    public function getLabel()
    {
        return 'Posiedzenie rady gminy';
    }

    public function getTitle()
    {
        return 'Posiedzenie numer <strong>' . $this->getData('numer') . '</strong> <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }

    public function getShortTitle()
    {
        return $this->dataSlownie($this->getDate());
    }

    public function getThumbnailUrl($size = '3')
    {
        return 'http://img.youtube.com/vi/' . $this->getData('preview_yt_id') . '/mqdefault.jpg';
    }

}