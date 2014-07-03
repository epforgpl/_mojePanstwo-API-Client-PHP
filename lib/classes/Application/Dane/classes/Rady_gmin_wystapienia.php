<?

namespace MP\Dane;

class Rady_gmin_wystapienia extends DocDataObject
{
	
	protected $schema = array(
		array('rady_gmin_debaty.tytul', 'Debata', 'string', array(
			'link' => array(
				'dataset' => 'rady_gmin_debaty',
				'object_id' => '$rady_gmin_debaty.id',
			),
		)),
		array('radni_gmin.nazwa_rev', 'Radny'),
		array('rady_gmin_posiedzenia.numer', 'Numer posiedzenia', 'string', array(
			'link' => array(
				'dataset' => 'rady_posiedzenia',
				'object_id' => '$rady_gmin_posiedzenia.id',
			),
		)),
		array('rady_gmin_posiedzenia.data', 'Data', 'date')
	);
	
    protected $routes = array(
        'title' => 'radni_gmin.nazwa_rev',
        'shortTitle' => 'radni_gmin.nazwa_rev',
        'date' => 'rady_gmin_posiedzenia.data',
    );
	
	protected $hl_fields = array(
		'rady_gmin_debaty.tytul', 'rady_gmin_posiedzenia.numer'
	);
	
    public function getThumbnailUrl($size = '3')
    {
        return 'http://img.youtube.com/vi/' . $this->getData('rady_gmin_debaty.yt_video_id') . '/mqdefault.jpg';
    }

    public function getLabel()
    {
        return 'Mówca: <strong>' . $this->getData('mowca_str') . '</strong>';
    }

    public function getUrl()
    {
        return '/dane/gminy/' . $this->getData('rady_gmin_debaty.gmina_id') . '/debaty/' . $this->getData('debata_id') . '#' . $this->getId();
    }

}