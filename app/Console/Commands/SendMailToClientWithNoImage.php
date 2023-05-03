<?php

namespace App\Console\Commands;

use App\Mail\ClientNoImage;
use App\Models\ClientDetail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailToClientWithNoImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:image-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to client without profile image';

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
        $clientEmails = ClientDetail::nullProfileImage()->pluck('email');
        foreach ($clientEmails as $clientEmail) {
            Mail::to($clientEmail)->send(new ClientNoImage());
        }
        return 0;
    }
}
