<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\FeedbackModel;

class Home extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $feedbackModel = new FeedbackModel();

        $data['total_artikel'] = $articleModel->countAllResults();
        $data['total_draft'] = $articleModel->where('status', 'draft')->countAllResults();
        $data['total_published'] = $articleModel->where('status', 'published')->countAllResults();
        $data['total_feedback'] = $feedbackModel->countAllResults();
        $data['artikel_terbaru'] = $articleModel->orderBy('updated_at', 'DESC')->findAll(3);
        $data['feedback_terbaru'] = $feedbackModel->orderBy('created_at', 'DESC')->findAll(3);

        return view('Admin\dashboard', $data);
    }
}
