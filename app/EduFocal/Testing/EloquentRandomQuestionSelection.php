<?php namespace EduFocal\Testing;

use DB;
use \Question;

class  EloquentRandomQuestionSelection implements QuestionQueryInterface {

    public function getQuestions($options=array())
    {
        $questions = $this->_getQuestions($options);
        $weight = 0;
        $result = array();

        foreach ($questions as $question) {
            $result[] = $question;
            $weight += $question->weight;
            if ($question->weight > 1) {
                $linked = DB::table('questions')
                              ->where('question_id', '=', $question->id)
                              ->orderBy('id', 'desc')
                              ->get();
                $result = array_merge($result, $linked);
            }

            if ($weight >= $options['limit']) {
                break;
            }
        }

        return $result;
    }

    protected function _getQuestions($options=array())
    {
        $query = DB::table('questions');

        if (isset($options['topic_id'])) {
            $query->where('topic_id', '=', $options['topic_id']);
        }

        if (isset($options['user_id'])) {
            $query->where('user_id', '=', $options['user_id']);
        }

        if (isset($options['except'])) {
            $query->whereNotIn('id', (array)$options['except']);
        }

        $query->where('status', '=', 'Accepted');
        $query->where('question_id', '=', 0);

        if (! isset($options['limit'])) {
            $options['limit'] = 5;
        }

        $result = $query->lists('id');

        $rand = array_rand($result, $options['limit']);
        $subset = [];
        for ($i = 0; $i < count($rand); $i++) {
            $subset[] = $result[$rand[$i]];
        }

        return Question::whereIn('id', $subset)->orderBy('weight', 'desc')->get();
    }
}
