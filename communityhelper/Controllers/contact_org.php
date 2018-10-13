<?
class CHController_contact_org {

  public function page($route){
    $data = CHController::getDetailsOnOrganization(URL_SECOND_PARAMETER);
    if(isset($_POST['message']) && !empty($_POST['message']))
    {
      $email = '<html><body><p>You have a new message from a user on Community Helper!</p>
      <p><strong>User:</strong> ' . $_POST['name'] . '</p>
      <p><strong>Email:</strong> ' . $_POST['email'] . '</p>
      <p><strong>Subject:</strong> ' . $_POST['subject'] . '
      <p><strong>Message:</strong>' . $_POST['message'] . '
      </body></html>';
      $to = $data['email'];
      $subject = 'New Community Helper Message: ' . $_POST['subject'];
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $headers .= 'From: <no-reply@community-helper.com>' . "\r\n";
      $headers .= 'Reply-to: ' . $_POST['email'] . "\r\n";
      mail($to, $subject, $email, $headers);
      echo '<p>Thank you, the organization has been sent your message and they will contact you via your registered email address.</p>';
    }
    else
      CHController::viewHandler('contact_org', $data);
  }

}
