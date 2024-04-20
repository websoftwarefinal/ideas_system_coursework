<?php
require_once __DIR__ . './../Models/Model.php';
require_once __DIR__ . './../Models/User.php';
require_once __DIR__ . './../Models/Idea.php';
require_once __DIR__ . './../Models/Comment.php';

class QaManagerStatisticsController{
    public function statistics(){
        $data = [];

        $model = new Model;

        $departments = $model->get('Department');

        foreach($departments as $department){
            $user = new User;
            $department_staff = $user->departmentStaff($department['department_id']);

            $countributors_count = 0;

            $department_ideas_count = 0;

            foreach($department_staff as $staff){
                $idea_count = $model->count('Idea', $staff['staff_id'], 'staff_id');

                $department_ideas_count = $department_ideas_count + $idea_count;

                if($idea_count > 0){
                    $countributors_count = $countributors_count + 1;
                }
            }
            
            array_push($data, [
                'department_name' => $department['department_name'],
                'contributors' => $countributors_count,
                'ideas' => $department_ideas_count,
            ]);
        }

        return $data;
    }

    public function chartData(){
        $data = [['Department', 'Ideas']];

        $model = new Model;

        $departments = $model->get('Department');

        $total_contributions = 0;

        foreach($departments as $department){
            $user = new User;
            $department_staff = $user->departmentStaff($department['department_id']);

            $countributors_count = 0;

            $department_ideas_count = 0;

            foreach($department_staff as $staff){
                $idea_count = $model->count('Idea', $staff['staff_id'], 'staff_id');

                $department_ideas_count = $department_ideas_count + $idea_count;

                $total_contributions = $total_contributions + $idea_count;

                if($idea_count > 0){
                    $countributors_count = $countributors_count + 1;
                }
            }
            
            array_push($data, [
                $department['department_name'],
                $department_ideas_count > 0 ? ($department_ideas_count/$total_contributions) * 100 : 0
            ]);
        }

        // Output data as JSON
        echo json_encode($data);
    }

    public function exceptions(){
        $model = new Model;

        $ideas_without_comment = 0;
        foreach($model->get('Idea') as $idea){
            $comments_count = $model->count('Comments', $idea['idea_id'], 'idea_id');
            if($comments_count == 0){
                $ideas_without_comment = $ideas_without_comment + 1;
            }
        }

        $idea = new Idea;
        $anonymous_ideas = $idea->anonymousIdeas();

        $comment = new Comment;
        $anonymous_comment = $comment->anonymousComments();
        return [
            'ideas_without_comments' => $ideas_without_comment,
            'anonymous_ideas' => $anonymous_ideas,
            'anonymous_comments' => $anonymous_comment
        ];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $statistics = new QaManagerStatisticsController;

    $statistics->chartData();
}