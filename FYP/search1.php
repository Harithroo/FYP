<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="pt" dir="ltr">

  <head>

    <title>Search And Show Without Refresh</title>

    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
    <meta http-equiv="Content-Style-Type" content="text/css">

    <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript">
      $(function() {
        $("#lets_search").bind('submit',function() {
          var value = $('#str').val();
           $.post('search2.php',{value:value}, function(data){
             $("#search_results").html(data);
           });
           return false;
        });
      });
    </script>

  </head>

  <body style="margin:0;padding:0px;width:100%;height:100%;background-color:#FFFFFF;">

    <div style="width:1024px;margin:0 auto;height:100px;background-color:#f0f0f0;text-align:center;">
      HEADER
    </div>
    <div style="width:1024px;margin:0 auto;height:568px;background-color:#f0f0f0;text-align:center;">
      <form id="lets_search" action="" style="width:400px;margin:0 auto;text-align:left;">
        Search:<input type="text" name="str" id="str">
        <input type="submit" value="send" name="send" id="send">
      </form>
      <div id="search_results"></div>
    </div>
    <div style="width:1024px;margin:0 auto;height:100px;background-color:#f0f0f0;text-align:center;">
      FOOTER
    </div>

  </body>

</html>