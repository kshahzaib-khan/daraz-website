<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order</title>
</head>
<style>
@media(max-width:927px){
    .scrolbar{
 overflow-x: scroll;
  white-space: nowrap;
     }
}
</style>
<body style="background-color:#F0F0F0;">
   <div style="max-width:1000px;width:100%;margin:0 auto;  box-sizing:border-box;background-color:#253555;padding-left:0px;padding-bottom: 90px; border-radius: 15px;margin-top:20px; padding-top: 22px;">

   <!--<div style="max-width:900px;width:100%;margin:0 auto;  box-sizing:border-box;background-color:#253555;padding-left:2px;padding-right: 20px; padding-bottom: 90px; border-radius: 15px;margin-top:20px; padding-top: 22px;">-->
    
    
      <h5 style="text-align:center;font-size:27px;color:white;margin:0px">Welcome to Daraz online purchase</h5>
      <h4 style="text-align:center;font-size:22px;color:white;margin-top:5px;margin-bottom:0px">Customer &amp; Product Detail</h4>
      <h5 style="text-align:center;font-size:16px;color:#0055FF;margin-top:8px;margin-bottom:0px">Expected Delivery Time: 3-5 Days</h5>

      <div>

       <div class="scrolbar">
         <table style="margin-left:-40px;margin-top:26px;box-sizing:border-box;width:100%;border-collapse:collapse;border-spacing:0;border-radius:12px;overflow: hidden;"> 
  
         <tbody><tr style="width:100%; background-color:#FFFFFF;font-family:'Montserrat',sans-serif">
     
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Trackin no</th>
     
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">First Name</th>
     
      
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Last Name</th>
     
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Phone Number</th>
     
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Alternate Number</th>
     
      <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Email</th>
     
      </tr>
     
     
       <tr style="width:100%;background-color:#fafafa;font-family:'Montserrat',sans-serif">
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['tracking_no']}}</td>
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['first_name']}}</td>
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['last_name']}}</td>
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['phone_no']}}</td>
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['alternate_phone']}}</td>
     
      <td style="padding:15px 20px;text-align:center">{{$order_data['email']}}</td>
     
       </tr>
     
      </tbody>
   </table>
</div>
   
     
                      @php $total="0"@endphp
                    @foreach ($item_in_cart as $data )
                  
      <table style="margin-left:-40px;margin-top:10px;box-sizing:border-box;width:100%;border-collapse:collapse;border-spacing:0;border-radius:12px;overflow:hidden;border:2px solid grey;"> 
  
  
          <tbody><tr style="width:100%;background-color:#fafafa;font-family:'Montserrat',sans-serif">
  
          <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase"> Product Image</th>
  
          <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Product Name</th>
  
          <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Qty</th>
  
          <th style="padding:15px 20px;text-align:center;background-color:grey;color:#fafafa;font-family:'Open Sans',Sans-serif;font-weight:200;font-size:small;text-transform:uppercase">Price</th>
  
          </tr>
  
  
          <tr style="width:100%;background-color:#fafafa;font-family:'Montserrat',sans-serif">
  
  
          <td style="padding:15px 20px;text-align:center;"><img src="{{ asset('upload/product/'.$data['item_image']) }}"style="width:80px;height:80px"></td>
  
          <td style="padding:15px 20px;text-align:center;font-weight: 600;">{{$data['item_name']}}</td>
  
          <td style="padding:15px 20px;text-align:center;font-weight: 600;">{{$data['item_quantity']}}</td>
  
          <td style="padding:15px 20px;text-align:center;font-weight: 600;">{{$data['item_price']}}</td>
  
  
          
          </tr>
  
          
          </tbody>
      
         </table>
         @php $total = $total + ($data['item_quantity']* $data['item_price']) @endphp
         @endforeach            
  

      
         <div style="background-color:white; font-size:15px; font-weight: 600; padding:16px; height:20px; float: right;margin-top:10px; margin-right:40px; border-radius: 10px;">
  
   Grand Total  Rs: {{number_format($total,2)}}
            

</div>
</body>
</html>