<?

namespace MP\Dane;

class Poslowie_glosy extends DataObject
{

    protected $_fields = array(
        'date' => 'sejm_glosowania.czas',
    );

    public function getLabel()
    {
        return 'Wynik głosowania posła';
    }

    public function getThumbnailUrl($size = '1')
    {
        return 'http://resources.sejmometr.pl/mowcy/a/' . $size . '/' . $this->getData('mowca_id') . '.jpg';
    }

    public function getUrl($options = array())
    {
        return false;
    }

    public function getTitle()
    {
        return 'Wynik głosowania posła ' . $this->getData('poslowie.nazwa') . ' w głosowaniu: ' . $this->getData('sejm_glosowania.tytul');
    }

}