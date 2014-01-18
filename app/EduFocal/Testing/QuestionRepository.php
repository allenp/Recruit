<?php namespace EduFocal\Testing;

class QuestionRepository implements QuestionRepositoryInterface {

    public function findByTopicAndFormat($topic, $format)
    {
        return array(
            'What is science?',
            'Is this worth it?'
        );
    }
}
