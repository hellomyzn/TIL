<?php

namespace App\Services\Laracasts;

use App\Services\Laracasts\Newslatter;
use MailchimpMarketing\ApiClient;

class MailchimpNewslatter implements Newslatter

{
    
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(String $email, $list=null){

        $list = $list ?? config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
                'email_address' => $email,
                'status' => 'subscribed'
        ]);
    }
}