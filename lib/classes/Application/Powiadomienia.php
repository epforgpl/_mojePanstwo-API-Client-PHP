<?

namespace MP;

class Powiadomienia extends Application
{

    protected $requests_prefix = '/powiadomienia/';

    public function getPhrases()
    {
        $ret = @$this->request('phrases');
        return $ret['phrases'];
    }

    public function addPhrase($phrase)
    {
        return $this->request('phrases', $phrase, 'POST');
    }

    public function removePhrase($phrase_id)
    {
        return $this->request('phrases/' . $phrase_id, array(), 'DELETE');
    }

    public function search($queryData = array())
    {
        if (!is_null($this->user_id)) {
            $data = $this->request('objects', $queryData, 'POST');
            $data = @$data['search'];

            foreach ($data['objects'] as &$object)
                $object = Dane::interpretateObject($object);

            return $data;
        } else {
            return false;
        }
    }

    public function markObject($object_id, $flag)
    {
        return $this->request('objects/' . $object_id . '/flag', $flag, 'POST');
    }

    public function markObjects($conditions, $flag)
    {
        return $this->request('objects/flag', array(
            'conditions' => $conditions,
            'flag' => $flag,
        ), 'POST');

    }

}