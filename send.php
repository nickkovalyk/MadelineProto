<?php
//
//if (!file_exists('madeline.php')) {
//    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
//}
//define('MADELINE_BRANCH', 'dev-master');

require_once 'vendor/autoload.php';

$settings = [
    'logger' => [
        'logger_level' => 1
    ],
    'serialization' => [
        'serialization_interval' => 30,
    ],
];
$settings['app_info']['api_id'] = '3133821';
$settings['app_info']['api_hash'] = 'f9ae54c0fa586975db56a883998f7e10';
//$settings['connection_settings']['all']['transport'] = 'ws';

$MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);
$MadelineProto->async(true);
$MadelineProto->loop(function () use ($MadelineProto) {
    yield $MadelineProto->start();

    $me = yield $MadelineProto->getSelf();

    $MadelineProto->logger($me);

    if (!$me['bot']) {
        $sum = 0;
        $count = 1;
        $message = " The coin  :  #SKY\n"
;
        foreach (range(1, $count) as $item) {
            $first = microtime(true);
            yield $MadelineProto->messages->sendMessage(['peer' => '@testjnk', 'message' => 'test']);
            printf("Request 1 taked: %s \n", microtime(true)- $first);

            $message .= "#". ( $second = microtime(true))."#";
            yield $MadelineProto->messages->sendMessage(['peer' => '@testjnk', 'message' => $message]);
            
            printf("Request 2 taked: %s \n", microtime(true)- $second);

        }

        yield $MadelineProto->stop();
        yield 'STOPPED';
    }
//    yield $MadelineProto->echo('OK, done!');
});
