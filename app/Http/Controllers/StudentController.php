<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Jobs\SendEmail;

class StudentController extends Controller
{
	public function queue()
	{
		dispatch(new SendEmail('shidun119@163.com'));
	}

    //
    public function error()
    {
    	// $name = 'shidun';
    	// var_dump($names);exit();
    	// $student = null;
    	// if ($student == null) {
    	// 	//跑出503错误页面
    	// 	abort('503');
    	// }
    	// return view('student.error');

    	// Log::info('这是一个info级别的日志');
    	// Log::warning('这是一个warning级别的日志');
    	Log::error('这是一个error级别的日志数组', ['name' => 'shidun', 'age'=>18]);
    }

    public function cache1()
    {
    	//put() 保存对象到缓存 //有效期10分钟
    	//Cache::put('key1', 'value1', 10);

    	//add() 存在返回false
    	// $bool = Cache::add('key2', 'val2', 10);
    	// var_dump($bool);

    	//forever() 永久保存
    	Cache::forever('key3', 'value3');

    	//has()
    	// if (Cache::has('key3')) {
    	// 	$val = Cache::get('key3');
    	// 	var_dump($val);
    	// } else {
    	// 	echo "no cache";
    	// }
    }


    public function cache2()
    {
    	// get() 缓存中获取对象
    	// $val = Cache::get('key3');

    	//pull() 缓存取出来后删除
    	// $val = Cache::pull('key3');

    	//forget() 删除
    	$bool = Cache::forget('key2');

    	var_dump($bool);
    }

    public function mail()
    {
    	// Mail::raw('邮件内容 测试', function($message) {
    	// 	$message->from('shidun911@163.com', 'shidun');
    	// 	$message->subject('邮件主题 测试');
    	// 	$message->to('shidun119@163.com');
    	// });

    	Mail::send('student.mail', ['name' => 'shidun'], function($message) {
    		$message->to('shidun119@163.com');
    	});
    	// return view('student.mail');
    }

    public function upload(Request $request)
    {
    	if ($request->isMethod('POST')) {
    		// var_dump($_FILES);exit();
    		$file = $request->file('source');
    		
    		//文件是否上传成功
    		if ($file->isValid()) {

    			//原文件名
    			$originalName = $file->getClientOriginalName();
    			//扩展名
    			$ext = $file->getClientOriginalExtension();
    			//MimeType
    			$type = $file->getClientMimeType();
    			//临时绝对路径
    			$realPath = $file->getRealPath();
    			$fileName = uniqid().'.'.$ext;
    			$bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
    			var_dump($bool);exit();

    		}
    	}
    	return view('student.upload');
    }
}
