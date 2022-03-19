<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\Socket\SecureServer;
use React\Socket\Server;

class ChatSocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $app = new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
                new \App\Sockets\ChatSocket()
            )
        );

        $loop = \React\EventLoop\Factory::create();

        $secure_websockets = new \React\Socket\Server('176.114.9.51:8080', $loop);
        $secure_websockets = new \React\Socket\SecureServer($secure_websockets, $loop, [
            'local_cert' => '/var/www/httpd-cert/gamestore/chirukinbb.theweb.place.crt',
            'local_pk' => '/var/www/httpd-cert/gamestore/chirukinbb.theweb.place.key',
            'verify_peer' => false
        ]);

        $secure_websockets_server = new \Ratchet\Server\IoServer($app, $secure_websockets, $loop);
        $secure_websockets_server->run();
    }
}
