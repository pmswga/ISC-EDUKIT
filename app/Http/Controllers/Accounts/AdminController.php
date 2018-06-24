<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Feedback;
use App\Models\Lists\ListEducationForm;
use App\Models\Lists\ListEducationPayForm;
use App\Models\Lists\ListRelationType;
use App\Models\Lists\ListAccountType;
use App\Models\Lists\ListEducationDay;
use App\Models\Lists\ListEducationPair;
use App\Models\Lists\ListFeedbackType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('accounts.admin.index', [
            'feedback_list_1' => Feedback::where("id_feedback_type", 1)->get(),
            'feedback_list_2' => Feedback::where("id_feedback_type", 2)->get(),
        ]);
    }

    public function settings()
    {
        return view('accounts.admin.settings', [
            'list_education_form' => ListEducationForm::get(),
            'list_education_pay_form' => ListEducationPayForm::get(),
            'list_relation_type' => ListRelationType::get(),
            'list_account_type' => ListAccountType::get(),
            'list_education_day' => ListEducationDay::get(),
            'list_education_pair' => ListEducationPair::get(),
            'list_feedback_type' => ListFeedbackType::get(),
        ]);
    }

}
