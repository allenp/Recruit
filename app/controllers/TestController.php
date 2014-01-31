<?php

class TestController extends AuthorizedController {

    protected $testSession;
    protected $tests;

    public function __construct(
        TestSessionInterface $ts, TestRepositoryInterface $tr)
    {
        parent::__construct();

        $this->testSession = $ts;
        $this->tests = $tr;
    }

    public function start()
    {
        $options = array();
        $options['topic_id'] = Input::post('topic');
        $options['format'] = Input::post('format');
        $options['teacher_id'] = Input::post('teacher_id'];
        //max_questions
        //page_size

        $test = $this->testSession->start($options);

        //TODO: check for $test == NULL before redirect.
        return Redirect::to_action('TestController@index', array($test->id));
    }

    public function index($id)
    {
        if (isset($_POST['quit'])) {
            return Redirect::to_action('DashboardController@index');
        }

        $test = $this->getTest($id);

        $pageIndex = Input::post('page') === FALSE ? 1 : Input::post('page');

        if (isset($_POST['previous'])) {
            $pageIndex = max(1, $pageIndex - 1);
        } else if (isset($_POST['next'])) {
            $pageIndex = $pageIndex + 1;
        }

        if (isset(_POST['Answer'])) {
            $this->testSession->setAnswers($test, Input::post('Answer'));
        }

        $answers = $this->testSession->getAnswers($test, $pageIndex);

        if ($answers === FALSE) {
            return Redirect::to_action(
                'TestController@getComplete', array($test->id));
        } else {
            //set answers in the template
        }
    }

    protected function getTest($id)
    {
        $options = array(
            'id' => $id,
            'user_id' => Auth::user()->id
        );

        $test = $this->tests->find($options);

        if ($test == NULL) {
            return Redirect::to_action('DashboardController@getIndex');
        }
        return $test;
    }

    public function complete($id)
    {
        $test = $this->getTest($id);
        $this->testSession->complete($test);
    }

    public function review($id)
    {
        $test = $this->getTest($id);
    }

    public function expired($id)
    {
        $test = $this->getTest($id);
    }

    public function saveRating()
    {
        $test = $this->getTest(Input::post('test'));
    }
}
