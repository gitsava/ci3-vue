<script src="/jquery.js" language="javascript" type="text/javascript"></script>  
  
<script type="text/javascript">  
  
    // Change this URL to be that of your own website  
    var base_url = "http://www.yourdomain.com/";  
    var base_url_length = base_url.length;  
      
    $(document).ready(function() {  
      
        $("a").click(function() {  
  
            var link_location = $(this).attr('href');  
              
            // if the link clicked is external  
            if (link_location.indexOf("http://")!=-1 && link_location.substr(0, base_url_length)!=base_url) {  
              
                /* DO ACTION HERE */  
                alert("You are leaving the website");  
              
            }  
          
        });  
      
    });  
  
</script>  