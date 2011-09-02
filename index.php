<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php

require 'fb-php-sdk/src/facebook.php';

$fb = new Facebook(array(
  'appId' => '133206583442452',
  'secret' => '3517f87909aa2140a7aedde74fa39171' ,
));
$isfan = FALSE;
$sr = $fb->getSignedRequest();
if (isset($sr['page']['liked'])) {
  $isfan = $sr['page']['liked'];
} 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>6Grad - Welcome Page</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8"/>
  </head>
  <body>
    <div id="fb-page">
      
      <div id="fan" >
        <div class="button" id="btn_sharepdf" 
          onclick="shareChecklist();"></div>
        <div class="button" id="btn_invite" 
          onclick="inviteFriends();"></div>
        <div class="button" id="btn_download" 
          onclick="open_link('http://www.6grad.ch/facebook/Checkliste_Facebook_Marketing.pdf')"></div>
      </div>
      
      <div id="notfan"></div>
      
      <div class="button" id="btn_sharefan" 
        onclick="shareFan();"></div>
      <div class="button" id="btn_book" 
        onclick="open_link('http://www.6grad.ch/facebook-buch/')"></div>
      <div class="button" id="btn_contact" 
        onclick="open_link('http://www.6grad.ch/contact/')"></div>
      <div class="button square" id="btn_twitter" 
        onclick="open_link('http://www.twitter.com/6grad')"></div>
      <div class="button square" id="btn_mail" 
        onclick="open_link('http://feedburner.google.com/fb/a/mailverify?uri=6gradfeed&loc=de_DE')"></div>
      <div class="button square" id="btn_rss" 
        onclick="open_link('http://www.6grad.ch/feed')"></div>
      
      
    </div>
    <div id='fb-root'></div>
  </body>
  <script src='http://connect.facebook.net/en_US/all.js'></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
  
  <script type="text/javascript">
    <?php
    if (isset($_GET['request_ids'])) {
      echo 'top.location.href="http://www.facebook.com/6grad";';
    }
    ?>
    FB.init({
      appId : '<?php echo $fb->getAppID()?>',
      status : true, // check login status
      cookie : true, // enable cookies to allow the server to access the session
      xfbml : false, // parse XFBML
      oauth : true // enable OAuth 2.0
    });
    
    var isFan = '<?php echo $isfan ?>';
    
    if (isFan){
      $('#notfan').fadeOut(500);
    }
    
    function open_link (url) {
      window.open(url);
    }
    
    function inviteFriends() {
      FB.ui({ method: 'apprequests',
        title: "Freunde einladen",
        message: "Werde 6Grad fan und profitiere von aktuellen Beiträgen rundum Social Media"
      });
    }
    
    function shareChecklist () {
      FB.ui({ method: 'feed',
            link: 'http://www.facebook.com/6grad',
            picture: "http://www.6grad.ch/facebook/images/6grad-logo_90x90.png",
            name: 'Checkliste heruntergeladen!',
            caption: 'www.6grad.ch',
            description: 'Komm und hol dir die Social Media Checkliste'
      });
    }
    function shareFan () {
      FB.ui({ method: 'feed',
            link: 'http://www.facebook.com/6grad',
            picture: "http://www.6grad.ch/facebook/images/6grad-logo_90x90.png",
            name: 'Ich bin 6Grad.ch fan',
            caption: 'www.6grad.ch',
            description: 'Komm vorbei und werde fan bei uns'
      });
    }

  </script>
</html>
