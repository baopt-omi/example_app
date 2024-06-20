<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TimeController extends Controller
{
    public function sync()
    {
        //$api_url = 'https://8e39ce985d6b9396859c5561dae13ffb6a7795ae:X@redmine.ominext.dev/issues.json';
        $api_url = 'https://50a7ba375affb9bdc36263986077d3b8f57cd386:X@new.redmine.ominext.com/time_entries.json?user_id=984';
        $response = Http::get($api_url);
        $mydatas = json_decode($response->getBody()->getContents());
        $mydata = array($mydatas);
        //$mydata = collect($mydata)->sortByDesc('spent_on')->reverse()->toArray();
        foreach ($mydata[0]->time_entries as $m) {
            Time::updateorinsert([
                'entryID' => $m->id,
                'projectName' => $m->project->name,
                'issueID' => $m->issue->id,
                'user' => $m->user->name,
                'activity' => $m->activity->name,
                'hours' => $m->hours,
                'comments' => $m->comments,
                'spentOn' => $m->spent_on,
                'createdOn' => $m->created_on,
                'updatedOn' => $m->updated_on,
//                'tcH' => $m->custom_fields[0]->value,
//                'tcH' => $m->custom_fields[1]->value,
//                'tcH' => $m->custom_fields[2]->value,
//                'tcH' => $m->custom_fields[3]->value,
//                'tcH' => $m->custom_fields[4]->value,
//                'tcH' => $m->custom_fields[5]->value,
//                'tcH' => $m->custom_fields[6]->value,
            ]);
        }
        echo "sync";
    }

    public function test() {
       $entries = Time::all();
       foreach ($entries as $e) {
           //$time = Time::all();
           $time[0] = [
               'assignee' => $e->user,
               'issue_id' => $e->issueID,
               'comment' => $e->comments,
               'start_date' => $e->spentOn,
               'actual_start_date' => $e->createdOn,
               'actual_end_date' => $e->updatedOn,
               'spent_time' => $e->hours,
           ];
           ;
           DB::connection('second_db')->table('employees_logtime')->insert($time);
           //dd($time);
           echo 'test';
       }

    }
}
