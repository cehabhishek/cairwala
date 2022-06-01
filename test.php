<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <input type="button" id="btn" value="Click" onclick="Wallet()"/>


<input type="text" value="100" id="a"/>
<input type="text" value="1" id="b"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

    function Wallet(id)
{
    var a=$('#a').val();
    var b=$('#b').val();
    alert(a);
    
            //var b=10;
            //alert(w_amount);
            //$('#wallet').html("Available Wallet Balance₹"+data);
            //var total=$('#chn_tot1').val();
            
            //alert(total);
            $.ajax({
                        url:'wallet.php',
                data:{data:id},
                type:'post',
                success:function(da)
                {
              alert(da);
            if(da >= a)
            {
                alert("a");false
                 $('#btn').attr('disabled',false);
                //$('#btn').hide();
           }
            if(da<a)
            {
                alert("b");
                 $('#btn').attr('disabled',true);
                 //$('#btn').show();
            }
             

           
            }
          }); 
            
             
        
}
</script>
</body>
</html>