<?

namespace MP\Dane;

class Rady_gmin_wystapienia extends DocDataObject
{

    protected $_fields = array(
        'title' => 'rady_gmin_debaty.tytul',
        'shortTitle' => 'rady_gmin_debaty.tytul',
        'date' => 'rady_gmin_posiedzenia.data',
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
        return $this->constants['url_protocol'] .
        $this->constants['url_host'] . '/dane/' .
        'rady_gmin_debaty' . '/' .
        $this->getData('rady_gmin_debaty.id') . '#' . $this->object_id;
    }

}