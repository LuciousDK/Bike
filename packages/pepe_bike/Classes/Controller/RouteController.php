<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;
class RouteController
{

    /**
     * @param ServerRequestInterface $request the current request
     * @return ResponseInterface the response with the content
     */
    public function sendStaticEmailAction(ServerRequestInterface $request): ResponseInterface
    {

        // Create an instance of MailMessage
        $mail = GeneralUtility::makeInstance(MailMessage::class);
        // Prepare and send the message
        // Defining the "From" email address and name as an object
        // (email clients will display the name)
        $mail->from(new Address('john.doe@example.org', 'John Doe'));

        // Set the "To" addresses
        $mail->to(
            new Address('receiver@example.com', 'Max Mustermann'),
            new Address('other@example.net')
        );

        // Give the message a subject
        $mail->subject('Normal Static Mail');

        // Give it the text message
        $mail->text('This is some static Text');

        // And optionally a HTML message
        $mail->html('<p style="background-color:red">This is some static HTML</p>');

        // And finally send it
        $mail->send();

        return new HtmlResponse('pepe');
    }

    /**
     * @param ServerRequestInterface $request the current request
     * @return ResponseInterface the response with the content
     */
    public function sendFluidEmailAction(ServerRequestInterface $request): ResponseInterface
    {


        $email = GeneralUtility::makeInstance(FluidEmail::class);
        $email->to('reciever@reciever.com');
        $email->from(new Address('sender@sender.com', 'Sender'));
        $email->subject('Fuild Email Test');
        $email->format('both'); // send HTML and plaintext mail
        $email->setTemplate('DynamicEmail');
        $email->assign('content', 'Pepe Content');
        GeneralUtility::makeInstance(Mailer::class)->send($email);
        return new HtmlResponse('pepe');
    }

    /**
     * Main function generating the BE scaffolding
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface the response with the content
     */
    public function mainAction(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse('pepe');
    }
}
