<?php namespace EduFocal\Testing;

interface QuestionRepositoryInterface {

    public function findByTopicAndFormat($topic_id, $format);
}
