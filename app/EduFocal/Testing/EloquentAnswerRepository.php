<?php namespace EduFocal\Testing;

use \Answer;

class EloquentAnswerRepository implements AnswerRepositoryInterface {

    public function find($options)
    {
        $answer = new Answer;
        foreach ($options as $key => $value) {
            $answer->where($key, '=', $value);
        }
        return $answer->first();
    }

    public function all($options)
    {
        $answer = new Answer;
        foreach ($options as $key => $value) {
            $answer->where($key, '=', $value);
        }
        return $answer->get();
    }

    public function save($answer)
    {
        return $answer->save();
    }

    public function create($options)
    {
        return Answer::create($options);
    }

}
