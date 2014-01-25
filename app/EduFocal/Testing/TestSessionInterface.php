<?php namespace EduFocal\Testing;

interface TestSessionInterface {

    public function start($options);
    public function getAnswers($test, $pageIndex);
    public function setAnswers($test, $answers);
    public function end($test);

}
