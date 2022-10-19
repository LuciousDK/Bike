<?php
declare (strict_types = 1);

namespace Luat\PepeBike\Command;

use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;

class SendEmailCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('This is an example command.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $email = GeneralUtility::makeInstance(FluidEmail::class);
        $email->to('reciever@reciever.com');
        $email->from(new Address('sender@sender.com', 'Sender'));
        $email->subject('EMail Through Command');
        $email->format('both'); // send HTML and plaintext mail
        $email->setTemplate('DynamicEmail');
        $email->assign('content', 'This Email was sent from the command line');
        GeneralUtility::makeInstance(Mailer::class)->send($email);
        // Do awesome stuff
        return Command::SUCCESS;
    }
}
