<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('发送邮件开始-'.$this->email);
        // Mail::raw('队列测试', function($message) {
        //     $message->to($this->email);
        // });

        Log::info('已发送邮件-'.$this->email);
    }

    /**
     * 要处理的失败任务。
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed()
    {
        Mail::raw('邮件内容 queue执行失败', function($message) {
            $message->from('shidun911@163.com', 'shidun');
            $message->subject('邮件主题 测试');
            $message->to('shidun119@163.com');
        });
        // 给用户发送失败通知，等等...
    }
}
