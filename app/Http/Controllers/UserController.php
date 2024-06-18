<?php

namespace App\Http\Controllers;


use App\Models\Issue;
use Illuminate\Http\Request;
use App\Models\User;
// Thêm thư viện để mã hóa password
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        echo "Success";
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Tìm đến đối tượng muốn update
        $user = User::findOrFail($id);
        //$this->edit($id);
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $data['password'] = Hash::make($request->password);

        // Update user
        $user->update($data);
        echo "success update user";
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        echo "success delete user";
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // lấy ra toàn bộ user
        $users = User::all();

        // trả về view hiển thị danh sách user
        return view('users.index', compact('users'));
    }

    public function getUser()
    {
        $user = User::all();
        return $user;
    }



//        foreach ($data as $user){
//            $user = (array)$user;

//            ::updateOrCreate(
//                ['id'=>$user['id']],
//                [
//                    'issueID'=>$user['issueID'],
//                    'projectName'=>$user['projectName'],
//                    'trackerName'=>$user['trackerName'],
//                    'statusName'=>$user['statusName'],
//                    'priorityName'=>$user['priorityName'],
//                    'authorName'=>$user['authorName'],
//                    'assigneeName'=>$user['assigneeName'],
//                ]




}
