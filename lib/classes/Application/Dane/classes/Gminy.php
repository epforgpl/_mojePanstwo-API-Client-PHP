<?

namespace MP\Dane;

class Gminy extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
        'label' => 'typ_nazwa',
    );

    public function getThumbnailUrl($size = 'default')
    {
        return 'http://resources.sejmometr.pl/gminy/thumbs/png/' . $this->getId() . '.png';
    }

}