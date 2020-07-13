<?php

namespace App\Console\Commands;

use App\Models\Configs;
use App\Models\EmailList;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class AutoSendMail extends Command
{
    protected $signature = 'email:send';
    
    protected $description = 'Command description';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        \Config::set('mail.host', Configs::getConfig('mail_host'));
        \Config::set('mail.driver', Configs::getConfig('mail_driver'));
        \Config::set('mail.port', Configs::getConfig('mail_port'));
        \Config::set('mail.username', Configs::getConfig('mail_username'));
        \Config::set('mail.password', Configs::getConfig('mail_password'));
        \Config::set('mail.encryption', Configs::getConfig('mail_encryption'));
        \Config::set('mail.from.name', Configs::getConfig('mail_from_name'));
        \Config::set('mail.from.address', Configs::getConfig('mail_from_address'));
    
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();
        /*$transport = (new \Swift_SmtpTransport('host', 'port'))
            ->setEncryption(null)
            ->setUsername('username')
            ->setPassword('secret')
            ->setPort(587);
        $mailer = app(\Illuminate\Mail\Mailer::class);
        $mailer->setSwiftMailer(new \Swift_Mailer($transport));
    
        $mail = $mailer
            ->to('user@laravel.com')
            ->send(new OrderShipped);*/
        
        $rows = EmailList::with('template')
            ->has('template')
            ->where('status', '=', 0)
            ->limit(10)
            ->get();
        
        foreach ($rows as $row) {
            $params = json_decode($row->params, true);
            Mail::send('emails.' . $row->template->template_file, $params, function ($message) use ($row) {
                //                $message->from('elearn@kienlongbank.com', 'Đào tạo');
                $message->to(explode(',', $row->emails))->subject($row->template->subject);
            });
    
            if (Mail::failures()) {
                
                var_dump(Mail::failures());
                
                EmailList::where('id', '=', $row->id)
                    ->update([
                        'error' => '',
                        'status' => 2,
                    ]);
                
                continue;
            }
    
            EmailList::where('id', '=', $row->id)
                ->update([
                    'status' => 1,
                ]);
        }
    }
}
