<?php

namespace App\Services\Laracasts;

use MailchimpMarketing\ApiClient;

class Newslatter
{
    public function subscribe(String $email, $list=null){

        $list = $list ?? config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list, [
                'email_address' => $email,
                'status' => 'subscribed'
        ]);
    }

    public function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us6'
        ]);

    }
}