<?php

use EduFocal\Testing\TestRepositoryInterface;
use EduFocal\Testing\TestRepository;
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
            'subject_id' => 3,
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
        $repo = new TestRepository();
        $test = $repo->create($options);
        $this->assertEquals($test->user_id, 1);
        $this->assertEquals($test->topic_id, 2);
        $this->assertEquals($test->subject_id, 3);
        $this->assertEquals($test->marked, true);
        $this->assertEquals($test->weight, '');
        $this->assertEquals($test->format, 'multiple');
    }

    public function testSave()
    {
        $options = $this->getOpts();
        $repo = new TestRepository();
        $test = $repo->create($options);
        $test->topic_id = 3;
        $this->assertTrue($repo->save($test));
    }

}
