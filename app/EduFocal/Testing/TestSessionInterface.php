<?php namespace EduFocal\Testing;

interface TestSessionInterface {

    public function startTest( $topic, $user, $teacher );
    public function getQuestionAnswers( $pageIndex );
    public function endTest( $test_id , $user );

}
