<?

namespace MP\Dane;

class Sejm_wystapienia extends DocDataObject
{

	public function __construct($params = array())
    {
        parent::__construct($params);
        $this->data['stanowisko_mowca'] = $this->data['stanowiska.nazwa'] . ' ' . $this->data['ludzie.nazwa'];
    }

	protected $schema = array(
		array('stanowisko_mowca', 'Mówca', 'string', array(
			'link' => array(
				'dataset' => 'poslowie',
				'object_id' => '$ludzie.posel_id',
			),
			'img' => 'http://resources.sejmometr.pl/mowcy/a/2/{$ludzie.id}.jpg',
		)),
		array('sejm_debaty.tytul', 'Debata', 'string', array(
			'truncate' => 90,
		)),
		array('data', 'Data wystąpienia', 'date'),
	);

    protected $routes = array(
        'title' => 'skrot',
        'shortTitle' => false,
        'date' => 'data',
    );

	protected $hl_fields = array(
		'stanowisko_mowca', 'sejm_debaty.tytul'
	);

    public function getLabel()
    {
        return '<strong>Wystąpienie</strong> w Sejmie';
    }

    public function getThumbnailUrl($size = false)
    {

        return ($this->getData('ludzie.avatar') == '1') ?
            'http://resources.sejmometr.pl/mowcy/a/1/' . $this->getData('ludzie.id') . '.jpg' :
            'http://mojepanstwo.pl/Dane/img/avatar_default.jpg';

    }

    public function hasHighlights(){
	    return false;
    }

}