<?php
/**
 * Nexoguard contact form handler.
 * Receives the form on index.html and emails it to your sales inbox.
 *
 * EDIT these two lines if needed:
 *   $to   = the inbox that receives leads
 *   $from = an address on THIS website's domain (Hostinger rejects "From" addresses on other domains)
 */
$to   = 'sales@nexoguard.com';
$from = 'noreply@nexoguard.net';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#contact');
    exit;
}

// Spam trap: bots fill the hidden "website" field; people don't.
if (!empty($_POST['website'])) {
    header('Location: /?sent=1#contact');
    exit;
}

function clean($key) {
    $v = isset($_POST[$key]) ? trim((string) $_POST[$key]) : '';
    $v = str_replace(["\r", "\n"], ' ', $v);   // block header injection
    return mb_substr(strip_tags($v), 0, 300);
}

$name    = clean('name');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$company = clean('company');
$role    = clean('role');
$need    = clean('need');
$tech    = isset($_POST['tech']) && is_array($_POST['tech'])
           ? implode(', ', array_map(function ($t) { return mb_substr(strip_tags($t), 0, 40); }, $_POST['tech']))
           : '';
$message = isset($_POST['message']) ? mb_substr(strip_tags(trim($_POST['message'])), 0, 4000) : '';

if ($name === '' || !$email || $company === '' || $message === '') {
    header('Location: /?error=1#contact');
    exit;
}

$subject = "New bench request: {$company} ({$need})";
$body  = "New request from nexoguard.net\n\n";
$body .= "Name:         {$name}\n";
$body .= "Email:        {$email}\n";
$body .= "MSP:          {$company}\n";
$body .= "Role:         {$role}\n";
$body .= "Needs:        {$need}\n";
$body .= "Technologies: {$tech}\n\n";
$body .= "Project description and timeline:\n{$message}\n";

$headers  = "From: Nexoguard Website <{$from}>\r\n";
$headers .= "Reply-To: {$name} <{$email}>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$ok = mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);

header('Location: /?' . ($ok ? 'sent=1' : 'error=1') . '#contact');
exit;
