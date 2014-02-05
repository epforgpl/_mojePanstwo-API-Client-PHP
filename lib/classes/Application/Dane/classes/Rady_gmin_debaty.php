<?

namespace MP\Dane;

class Rady_gmin_debaty extends DocDataObject
{
	
	protected $schema = array(
		array('gminy.nazwa', 'Gmina', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gminy.id',
			),
		)),
		array('rady_gmin_posiedzenia.numer', 'Posiedzenie', 'string', array(
			'link' => array(
				'dataset' => 'rady_posiedzenia',
				'object_id' => '$rady_gmin_posiedzenia.id',
			),
		)),
		array('numer_punktu', 'Punkt', 'string'),
		array('opis', 'Temat')
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'rady_gmin_posiedzenia.data',
    );
    
    protected $hl_fields = array(
    	'gminy.nazwa', 'rady_gmin_posiedzenia.numer', 'numer_punktu', 'opis',
    );

    public function getThumbnailUrl($size = '3')
    {
        return 'http://img.youtube.com/vi/' . $this->getData('yt_video_id') . '/mqdefault.jpg';
    }

    public function getLabel()
    {
        return 'Debata na posiedzeniu <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }

}