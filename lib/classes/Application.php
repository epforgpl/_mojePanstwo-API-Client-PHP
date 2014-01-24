<?

namespace MP;

abstract class Application extends API
{
    protected $user_id;

    public function __construct($user_id = null, $stream_id = 1)
    {
        parent::__construct($user_id, $stream_id);
    }
}