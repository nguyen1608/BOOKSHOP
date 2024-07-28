<?php
class FeedBackController
{

    use Controller;
    private $feedback;


    function __construct()
    {
        $this->feedback = $this->model("CmtModel");
    }

    function index()
    {

        $this->view(
            "admin.layout.Components.Feedback.list",
            [
                'feedbacks' => $this->feedback->loadAll(),

            ]

        );
    }

    function delete($id)
    {
        $result = $this->feedback->delete($id);
        if ($result) {
            header("location:" . URL . "Admin/listFeedBack");
            $this->view("admin.layout.Components.Feedback.list", ['feedbacks' => $this->feedback->all()]);
        }
        return false;
    }
}
