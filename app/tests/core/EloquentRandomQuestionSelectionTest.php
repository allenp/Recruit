<?php

use EduFocal\Testing\EloquentRandomQuestionSelection;
use Mockery as m;

class EloquentRandomQuestionSelectionTest extends TestCase {

    public function tearDown()
    {
        m::close();
    }

    public function testGetQuestions()
    {
        $user = User::where('username','=','teacher')->first();
        $topic = Topic::where('permalink','=','functions_graphs')->first();
        $options = array(
            'user_id' => $user->id,
            'topic_id' => $topic->id,
            'limit' => 5
        );
        $query = new EloquentRandomQuestionSelection();
        $result = $query->getQuestions($options);

        $this->assertCount(5, $result);
    }
}
