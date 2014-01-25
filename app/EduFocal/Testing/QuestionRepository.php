<?php namespace EduFocal\Testing;

use \Question;

class QuestionRepository implements QuestionRepositoryInterface {

    public function create($options)
    {
        return Question::create($options);
    }

    public function save($question)
    {
        return $question->save();
    }

    //TODO: refactor into class if need to change.
    public function countAvailableQuestions($options)
    {
        $query = DB::table('questions');

        $query->where->('status', '=', 'Accepted');
        $query->where('question_id', '=', 0);

        if (isset($options['topic_id'])) {
            $query->where('topic_id', '=', $options['topic_id']);
        }

        if (isset($options['user_id'])) {
            $query->where('user_id', '=', $options['user_id']);
        }

        if (isset($options['limit'])) {
            $query->take($options['limit']);
        }

        return $query->sum('weight');
    }
}
