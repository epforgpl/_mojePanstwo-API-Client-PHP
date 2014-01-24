<?

namespace MP\Dane;

class Sejm_wystapienia extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'ludzie.nazwa',
        'date' => 'data',
    );

    public function getLabel()
    {
        return '<strong>Wystąpienie</strong> w Sejmie';
    }

    public function getThumbnailUrl($size = false)
    {

        return ($this->getData('ludzie.avatar') == '1') ?
            'http://resources.sejmometr.pl/mowcy/a/2/' . $this->getData('ludzie.id') . '.jpg' :
            'http://sejmometr.pl/g/gp_2.jpg';

    }

}