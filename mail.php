<?php
/**
 * mail.php – Contact Form SMTP Handler
 * Uses PHPMailer (bundled in /phpmailer/)
 *
 * POST fields: name, email, subject, message
 * Returns JSON: { "success": true } or { "success": false, "error": "..." }
 *
 * ─────────────────────────────────────────
 *  HOW TO SET UP:
 *  1. Download PHPMailer from https://github.com/PHPMailer/PHPMailer
 *  2. Copy PHPMailer.php, SMTP.php, Exception.php into the /phpmailer/ folder
 *  3. Fill in your SMTP credentials below
 *  4. For Gmail: enable "App Passwords" in your Google Account security settings
 * ─────────────────────────────────────────
 */

header('Content-Type: application/json; charset=utf-8');

/* ── Load PHPMailer ── */
$phpmailer_path = __DIR__ . '/phpmailer/PHPMailer.php';

if (!file_exists($phpmailer_path)) {
    echo json_encode([
        'success' => false,
        'error' => 'PHPMailer not found. Please install PHPMailer in the /phpmailer/ folder.'
    ]);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';

/* ── Only accept POST ── */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed.']);
    exit;
}

/* ── Sanitize inputs ── */
$name = trim(strip_tags($_POST['name'] ?? ''));
$email = trim(strip_tags($_POST['email'] ?? ''));
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

/* ── Server-side validation ── */
if (!$name || !$email || !$message) {
    echo json_encode(['success' => false, 'error' => 'Name, email, and message are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email address.']);
    exit;
}

/* ════════════════════════════════════════
   ⚙️  SMTP CONFIGURATION  ← EDIT HERE
   ════════════════════════════════════════ */
$smtp_host = 'smtp.gmail.com';          // SMTP server (gmail, outlook, etc.)
$smtp_port = 587;                        // 587 for TLS, 465 for SSL
$smtp_username = 'your-email@gmail.com';    // ← Your Gmail / SMTP email
$smtp_password = 'your-app-password-here';  // ← App Password (NOT your login password)
$smtp_secure = PHPMailer::ENCRYPTION_STARTTLS; // Use ENCRYPTION_SMTPS for port 465

$recipient_email = 'silambarasan03.k@gmail.com'; // ← Where you want to receive emails
$from_name = 'Portfolio Contact Form';

/* ════════════════════════════════════════ */

$mail = new PHPMailer(true);

try {
    /* SMTP Settings */
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = $smtp_secure;
    $mail->Port = $smtp_port;
    $mail->CharSet = 'UTF-8';

    /* Recipients */
    $mail->setFrom($smtp_username, $from_name);
    $mail->addAddress($recipient_email, 'Silambarasan K');
    $mail->addReplyTo($email, $name);

    /* Content */
    $mail->isHTML(true);
    $mail->Subject = $subject ? "Portfolio: $subject" : "Portfolio: New Message from $name";

    /* HTML Email Body */
    $mail->Body = "
    <div style='font-family:Arial,sans-serif;max-width:600px;margin:0 auto;background:#0d0d14;color:#e2e8f0;border-radius:12px;overflow:hidden'>
      <div style='background:linear-gradient(135deg,hsl(262,80%,65%),hsl(290,70%,60%));padding:24px 32px'>
        <h2 style='margin:0;color:#0d0d14;font-size:1.4rem'>New Portfolio Message</h2>
      </div>
      <div style='padding:32px'>
        <table style='width:100%;border-collapse:collapse'>
          <tr>
            <td style='padding:8px 0;color:#8fa0b0;font-size:0.875rem;width:80px'>Name</td>
            <td style='padding:8px 0;color:#e2e8f0;font-weight:600'>" . htmlspecialchars($name) . "</td>
          </tr>
          <tr>
            <td style='padding:8px 0;color:#8fa0b0;font-size:0.875rem'>Email</td>
            <td style='padding:8px 0;color:#a78bfa'><a href='mailto:" . htmlspecialchars($email) . "' style='color:#a78bfa;text-decoration:none'>" . htmlspecialchars($email) . "</a></td>
          </tr>
          " . ($subject ? "<tr><td style='padding:8px 0;color:#8fa0b0;font-size:0.875rem'>Subject</td><td style='padding:8px 0;color:#e2e8f0'>" . htmlspecialchars($subject) . "</td></tr>" : '') . "
        </table>
        <hr style='border:none;border-top:1px solid #2d2d42;margin:20px 0' />
        <p style='color:#8fa0b0;font-size:0.8rem;margin:0 0 8px'>Message</p>
        <p style='color:#e2e8f0;line-height:1.7;white-space:pre-wrap'>" . nl2br(htmlspecialchars($message)) . "</p>
      </div>
      <div style='padding:16px 32px;background:#09090f;text-align:center;color:#8fa0b0;font-size:0.75rem'>
        Sent from Silambarasan K&rsquo;s Portfolio Contact Form
      </div>
    </div>";

    /* Plain text fallback */
    $mail->AltBody = "Name: $name\nEmail: $email\n" . ($subject ? "Subject: $subject\n" : "") . "\nMessage:\n$message";

    $mail->send();

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    /* Log the error (check server error_log) */
    error_log('PHPMailer Error: ' . $mail->ErrorInfo);

    echo json_encode([
        'success' => false,
        'error' => 'Failed to send email. Please try again or contact me directly at silambarasan03.k@gmail.com'
    ]);
}
