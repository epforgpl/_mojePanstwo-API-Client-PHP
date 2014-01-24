<?

namespace MP\Dane;

class Poslowie extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Poseł na Sejm RP';
    }

    public function getThumbnailUrl($size = '5')
    {
        return 'http://resources.sejmometr.pl/mowcy/a/' . $size . '/' . $this->getData('mowca_id') . '.jpg';
    }


}