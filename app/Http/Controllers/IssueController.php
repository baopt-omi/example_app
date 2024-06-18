<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class IssueController extends Controller
{

    public function create(Request $request)
    {
        //Carbon::createFromFormat('d-m-Y',$request->)->format('Y-m-d');
        return view('issue.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        //$data['password'] = Hash::make($request->password);
        Issue::create($data);
        echo "Success";
    }

    public function edit($id)
    {
        $issue = Issue::findOrFail($id);

        return view('issue.edit', compact('issue'));
    }

    public function update(Request $request, $id)
    {
        // Tìm đến đối tượng muốn update
        $issue = Issue::findOrFail($id);
        //$this->edit($id);
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        //$data['password'] = Hash::make($request->password);

        // Update user
        $issue->update($data);
        echo "success update";
    }

    public function delete($id)
    {
        $issue = Issue::findOrFail($id);

        $issue->delete();
        echo "success delete";
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // lấy ra toàn bộ user
        $issue = Issue::all();

        // trả về view hiển thị danh sách user
        return view('issue.index', compact('issue'));
    }

    public function getIssue()
    {
        $i = Issue::all();
        return $i;
    }

    public function remotedtb()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://redmine.ominext.dev/issues.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    return view('issue.index', compact('response'));
    }


    public function localdtb($id = null)
    {
//        $client = new Client();
//
//        $res = $client->request('GET','redmine.ominext.dev/issues.json')->getBody();
//
//        $issue = json_decode($res, true);

//        $api_url = 'https://b1ba196b818ee1f61bfa51196eea529fa7f05ec4:X@redmine.ominext.dev/issues.json';
//        $response = Http::get($api_url);
//        $data = json_decode($response->body());
//        echo "<pre>";

        if ($id) {
            $issue = Issue::find($id);
        } else {
            $issue = Issue::all();
        }
        return $issue;
    }

    public function sync(Request $request)
    {
        $client = new Client();
        $response = $client->get(
            'https://redmine.ominext.dev/issues.json', [
            'headers' => [
                'APP_KEY' => 'b1ba196b818ee1f61bfa51196eea529fa7f05ec4',
            ],
        ]);
        $mydata = json_decode($response->getBody()->getContents(),);

        $mydatas = $mydata;
        //dd($mydatas);
        //DB::table('issues')->insert([$mydatas]);
        Issue::create(array($mydatas));
    }

    public function sinc()
    {
        $api_url = 'https://8e39ce985d6b9396859c5561dae13ffb6a7795ae:X@redmine.ominext.dev/issues.json';
        $response = Http::get($api_url);
        $mydatas = json_decode($response->getBody()->getContents());

        $mydata = array($mydatas);
        $arr_test = [];
        foreach ($mydata[0]->issues as $m) {
            //$arr_test[]['project_name'] = $m->project->name;
            //dd($m->custom_fields);
//            if (!$m->assigned_to) {
//                $m->assigned_to = null;
//            }
//            if (!$m->custom_fields[0]->value) {
//                $m->custom_fields[0]->value = null;
//            }
            Issue::updateOrInsert([
                'issueID' => $m->id,
                'projectName' => $m->project->name,
                'trackerName' => $m->tracker->name,
                'statusName' => $m->status->name,
                'priorityName' => $m->priority->name,
                'authorName' => $m->author->name,
                //'assigneeName' => $m->assigned_to->name,
                'Subject' => $m->subject,
                'Description' => $m->description,
                'startDate' => $m->start_date,
                'dueDate' => $m->due_date,
                'doneRatio' => $m->done_ratio,
                'isPrivate' => $m->is_private,
                'estimatedHours' => $m->estimated_hours,
                //'PIC' => $m->custom_fields[0]->value,
                'actualStartDate' => $m->custom_fields[1]->value,
                'actualEndDate' => $m->custom_fields[2]->value,
                'created_at' => $m->created_on,
                'updated_at' => $m->updated_on,
                'closedOn' => $m->closed_on,
            ]);
        }
        echo "sinc";
    }
}
