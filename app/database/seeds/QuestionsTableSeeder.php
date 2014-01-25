<?php

class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->delete();

        $topic = Topic::first();
        $teacher = User::where('username', '=', 'teacher')->first()->id;

        $questions = array(
            array(
                'question' => '<p>Factorize 1-16x<sup>2</sup></p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'accepted_answers' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'choices' => '{"1":"<p>(1-8x)(1+2x)<\/p>","2":"<p>(1-4x)(1+4x)&nbsp;<\/p>","3":"<p>(1+4x)(1+4x)<\/p>","4":"<p>(1-8X)(1-2X)<\/p>"}'
            ),
            array(
                'question' => '<p>Simplify the following:&nbsp;</p>
                <p><img src="http://latex.codecogs.com/gif.latex?\fn_cm&amp;space;\frac{6x+12}{3}" align="absmiddle" alt="" /></p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>-2<\/p>","2":"<p>-1<\/p>","3":"<p>2<\/p>","4":"<p>3<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=3-x<sup>2, </sup>the value of x for which f(x)=-13</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>-2<\/p>","2":"<p>-1<\/p>","3":"<p>2<\/p>","4":"<p>3<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=3-x<sup>2, </sup>the value of x for which f(x)=-13</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>4<\/p>","2":"<p>-4<\/p>","3":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\pm4\" align=\"absmiddle\" alt=\"\" \/><\/p>","4":"<p>16<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=2x<sup>2</sup>-3x+5, then f(-2)</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 1,
                'choices' => '{"1":"<p>19<\/p>","2":"<p>7<\/p>","3":"<p>3<\/p>","4":"<p>-3<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=3-x<sup>2, </sup>the value of x for which f(x)=-13</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>4<\/p>","2":"<p>-4<\/p>","3":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\pm4\" align=\"absmiddle\" alt=\"\" \/><\/p>","4":"<p>16<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x) = 3x+5, then f<sup>-1</sup>(x)=&nbsp;</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 2,
                'choices' => '{"1":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{5x}{3}\" align=\"absmiddle\" alt=\"\" \/><\/p>","2":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{5-x}{3}\" align=\"absmiddle\" alt=\"\" \/><\/p>","3":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{x-5}{3}\" align=\"absmiddle\" alt=\"\" \/><\/p>","4":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{3x}{5}\" align=\"absmiddle\" alt=\"\" \/><\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=&nbsp;<img src="http://latex.codecogs.com/gif.latex?\frac{2x-1}{x+2},&amp;space;then&amp;space;f(3)" align="absmiddle" alt="" /></p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 2,
                'choices' => '{"1":"<p>-1<\/p>","2":"<p>1<\/p>","3":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{4}{5}\" align=\"absmiddle\" alt=\"\" \/><\/p>","4":"<p><img src=\"http:\/\/latex.codecogs.com\/gif.latex?\\frac{6}{5}\" align=\"absmiddle\" alt=\"\" \/><\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=x-3, and q(x)=2x+1, then fq(x)=</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>-2<\/p>","2":"<p>-1<\/p>","3":"<p>2<\/p>","4":"<p>3<\/p>"}'
            ),
            array(
                'question' => '<p>A function is given by&nbsp;<img src="http://latex.codecogs.com/gif.latex?\frac{3x+6}{x-2}" align="absmiddle" alt="" />&nbsp;, the value of x, for which the function is equal to zero is</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 4,
                'choices' => '{"1":"<p>6<\/p>","2":"<p>3<\/p>","3":"<p>2<\/p>","4":"<p>-2<\/p>"}'
            ),
            array(
                'question' => '<p>A function is given by f(x)=2x-3, find the value of x, such that f(x)=5</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 4,
                'choices' => '{"1":"<p>4<\/p>","2":"<p>5<\/p>","3":"<p>6<\/p>","4":"<p>7<\/p>"}'
            ),
            array(
                'question' => '<p>If f(x)=2x+1 and fq(x)=6x+3, then function q is=</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>3x+2<\/p>","2":"<p>3x<\/p>","3":"<p>3x+1<\/p>","4":"<p>3x+3<\/p>"}'
            ),
            array(
                'question' => '<p>A function is given by f(x)=&nbsp;<img src="http://latex.codecogs.com/gif.latex?\frac{2x+4}{x-3}" align="absmiddle" alt="" />&nbsp;, the value of x for which the function is undefined is</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 1,
                'choices' => '{"1":"<p>3<\/p>","2":"<p>4<\/p>","3":"<p>5<\/p>","4":"<p>6<\/p>"}'
            ),
            array(
                'question' => '<p class="p1">If f(x) = 3x+4, then f(-1) =</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>-7<\/p>","2":"<p>-1<\/p>","3":"<p>1<\/p>","4":"<p>7<\/p>"}'
            ),
            array(
                'question' => '<p>Which of the following point classes does not lie on the line y=3-2x?</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p class=\"p1\">(0,3)<\/p>","2":"<p class=\"p1\">(-1, 5)<\/p>","3":"<p class=\"p1\">(2,1)<\/p>","4":"<p class=\"p1\">&nbsp;(-2,7)<\/p>"}'
            ),
            array(
                'question' => '<p>Which of the following equations represents a straight line?</p>',
                'question_id' => 0,
                'user_id' => $teacher,
                'topic_id' => $topic->id,
                'editor_id' => $teacher,
                'weight' => 1,
                'type' => 'Multiple',
                'status' => 'Accepted',
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'accepted_answers' => 3,
                'choices' => '{"1":"<p>y= x<sup>2<\/sup>+3x<\/p>","2":"<p>xy=6<\/p>","3":"<p>y=5-3x<\/p>","4":"<p>y=x<sup>2<\/sup>+2<\/p>"}'
            )
        );

        DB::table('questions')->insert( $questions );
    }
}
