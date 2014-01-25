<?php

use Woodling\Woodling;
use Carbon\Carbon;
use EduFocal\Testing\TestSession;
use \Test;
use Mockery as m;

class TestSessionTest extends TestCase {

    public function tearDown()
    {
        m::close();
    }

    protected function createDependencies()
    {
        $tr = m::mock('EduFocal\Testing\TestRepository');
        $qb = m::mock('EduFocal\Testing\QuestionQueryInterface');
        $ar = m::mock('EduFocal\Testing\AnswerRepositoryInterface');
        return array($tr, $qb, $ar);
    }

    public function testSetMaximumQuestionsOnTest()
    {
        //with less questions than requested maximum
        list($tr, $qb, $ar) = $this->createDependencies();
        $tr->shouldReceive('countAvailableQuestions')
                 ->once()->andReturn(20);
        $tr->shouldReceive('create')
            ->once()->with(m::on(function($options) {
                return $options['max_questions'] == 20;
            }));

        $session = new TestSession($tr, $qb, $ar);

        $options = array(
            'max_questions' => 30,
            'user_id' => 1,
            'topic_id' => 2
        );

        $test = $session->start($options);

        //this time with more questions than requested maximum
        list($tr, $qb, $ar) = $this->createDependencies();
        $tr = m::mock('EduFocal\Testing\TestRepositoryInterface');
        $tr->shouldReceive('countAvailableQuestions')
                  ->once()->andReturn(40);
        $tr->shouldReceive('create')
                  ->once()->with(m::on(function($options) {
                      return $options['max_questions'] == 30;
                  }));

        $session = new TestSession($tr, $qb, $ar);

        $test = $session->start($options);
    }

    public function testPageSize()
    {
        //test with page_size too low
        list($tr, $qb, $ar) = $this->createDependencies();
        $tr->shouldReceive('countAvailableQuestions')
           ->twice();
        $tr->shouldReceive('create')
           ->twice()->with(m::on(function($options) {
               return $options['page_size'] == 1;
           }));

        $options = array(
            'page_size' => 0,
            'user_id' => 1,
            'topic_id' => 2
        );

        $session = new TestSession($tr, $qb, $ar);
        $test = $session->start($options);

        $options['page_size'] = -1;

        $test = $session->start($options);

        list($tr, $qb, $ar) = $this->createDependencies();
        $tr->shouldReceive('countAvailableQuestions')
           ->once();
        $tr->shouldReceive('create')
           ->once()->with(m::on(function($options) {
               return $options['page_size'] == 5;
           }));

        //test with no page_size variable
        unset($options['page_size']);

        $session = new TestSession($tr, $qb, $ar);
        $session->start($options);
    }

    public function testMissingUserAndTopic()
    {
        list($tr,$qb,$ar) = $this->createDependencies();
        $tr->shouldReceive('countAvailableQuestions')->once();
        $tr->shouldReceive('create')
           ->once()->with(m::on(function($options) {
               return $options['topic_id'] = 2 && $options['user_id'] = 1;
           }));

        $options = array(
            'user_id' => 1,
            'topic_id' => 2
        );

        $session = new TestSession($tr, $qb, $ar);

        $test = $session->start($options);

        try {
            $test = $session->start(array());
        } catch (\Exception $expected) {
            return;
        }
        $this->fail('Expected missing arguments to raise exception.');
    }

    public function testStart()
    {
        list($tr, $qb, $ar) = $this->createDependencies();

        $tr->shouldReceive('countAvailableQuestions')
           ->once()->andReturn(20);

        $tr->shouldReceive('create')->passthru();

        $options = $this->getOpts();

        $session = new TestSession($tr, $qb, $ar);

        $test = $session->start($options);

        $this->assertEquals($test->user_id, 1);
        $this->assertEquals($test->topic_id, 2);
        $this->assertEquals($test->subject_id, 3);
        $this->assertEquals($test->marked, true);
        $this->assertEquals($test->weight, '');
        $this->assertEquals($test->format, 'multiple');
    }

    public function testGetAnswersMethod()
    {
        list($tr, $qb, $ar) = $this->createDependencies();
        //TODO: Setup woodling for answers and questions
        //TODO: mock the answers property on test

        $ar->shouldReceive('createAnswer')
           ->atleast(5);

        $question = Woodling::retrieve('QuestionOne');
        $questions = [$question, $question, $question, $question, $question];
        $qb->shouldReceive('getQuestions')
           ->once()->andReturn($questions);

        $test = m::mock('\Test');
        $test->shouldReceive('getWeights')
            ->twice()->andReturn(array(), array(5));
        $test->shouldDeferMissing();

        $test->max_questions = 10;
        $test->topic_id = $question->topic_id;
        $test->answers = $questions;
        $test->page_size = 5;
        $this->assertNull($test->finished_at);

        $tr->shouldReceive('findById')
           ->once()->andReturn($test);

        $session = new TestSession($tr, $qb, $ar);
        $retrieved = $session->getAnswers($test, 1);

        $this->assertEquals(count($retrieved), 5);
    }

    protected function getOpts()
    {
        $options = array(
            'user_id' => 1,
            'topic_id' => 2,
            'subject_id' => 3,
            'started_at' => Carbon::now(),
            'marked' => true,
            'weight' => '',
            'format' => 'multiple'
        );
        return $options;
    }
}
