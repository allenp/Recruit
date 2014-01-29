<?php

use EduFocal\Testing\EloquentTestRepository;
use Mockery as m;

class TestRepositoryTest extends TestCase {

    public function tearDown()
    {
        m::close();
    }

    protected function getOpts()
    {
        $options = array(
            'user_id' => 1,
            'topic_id' => 2,
            'course_id' => 3,
            'started_at' => Carbon::now(),
            'marked' => true,
            'weight' => '',
            'format' => 'multiple'
        );
        return $options;
    }

    public function testCreate()
    {
        $options = $this->getOpts();
        $repo = new EloquentTestRepository();
        $test = $repo->create($options);
        $this->assertEquals($test->user_id, 1);
        $this->assertEquals($test->topic_id, 2);
        $this->assertEquals($test->course_id, 3);
        $this->assertEquals($test->marked, true);
        $this->assertCount(0, $test->weight);
        $this->assertEquals($test->format, 'multiple');
    }

    public function testSave()
    {
        $options = $this->getOpts();
        $repo = new EloquentTestRepository();
        $test = $repo->create($options);
        $test->topic_id = 3;
        $this->assertTrue($repo->save($test));
    }

    public function testFindByIdAndUser()
    {
        $repo = new EloquentTestRepository();
        $test = $repo->create($this->getOpts());
        $test2 = $repo->find(array('user_id' => 1, 'id' => $test->id));
        $this->assertEquals($test->id, $test2->id);
        $this->assertEquals($test->user_id, $test2->user_id);
        $this->assertEquals($test->topic_id, $test2->topic_id);
        $this->assertEquals($test->course_id, $test2->course_id);
    }

}
