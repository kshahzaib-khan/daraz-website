
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />

 <title>order</title>

</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');

/* .custom-container{
    max-width: 900px;
    width: 100%;
    margin: 0 auto;
     } */

     @media(max-width:927px){
    .scrolbar{
 overflow-x: scroll;
  white-space: nowrap;
     }
}
/* table{

 box-sizing: border-box;
 width: 100%; 
 border-collapse: collapse;
 border-spacing: 0;
 box-shadow: 0 2px 15px rgba(185, 185, 185, 0.7);
 border-radius: 12px;
 overflow: hidden;

} */
/* td , th{
 padding: 15px 20px; text-align: center;
 
 

} */
 /* th{

 background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
 
} */


/* tr{
 width: 100%; background-color: #fafafa; font-family: 'Montserrat', sans-serif;


}  */


/* h4{
    text-align: center;font-size: 22px; color: grey; margin-top: 5px; margin-bottom: 0px;
    
   
   
   
}
 h5{
    text-align: center; font-size: 27px; color: grey; margin-bottom: 0px;
   
   
     
 } */
/* .grand-total{
    float:right; margin-top:15px; background-color:white; box-shadow: 0 2px 15px rgba(185, 185, 185, 0.7); padding: 20px; border-radius: 12px; font-size: 20px;
   
   
   
   
   
} */
</style>
<body>


           <div style=" max-width: 900px;width: 100%; margin: 0 auto;">
    
    
            <h5 style=" text-align: center; font-size: 27px; color: grey; margin-bottom: 0px;
">Daraz = Welcome to Daraz inline purchase</h5>
            <h4 style=" text-align: center;font-size: 22px; color: grey; margin-top: 5px; margin-bottom: 0px;
">Customer & Product Detail</h4>
            <div class="scrolbar">
               <table style="margin-top: 26px;  box-sizing: border-box; width: 100%; border-collapse:collapse; border-spacing: 0; box-shadow: 0 2px 15px rgba(185, 185, 185, 0.7);  border-radius: 12px;  overflow:hidden;">
               <tr style=" width: 100%; background-color: #fafafa; font-family: 'Montserrat', sans-serif;">
           
            <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Trackin no</th>
           
            <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">First Name</th>
           
            
            <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Last Name</th>
           
            <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Phone Number</th>
           
            <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Alternate Number</th>
           
            <th style=" padding: 15px 20px; text-align: center; background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Email</th>
           
            </tr>
           
           
             <tr style=" width: 100%; background-color: #fafafa; font-family: 'Montserrat', sans-serif;">
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['tracking_no']}}</td>
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['first_name']}}</td>
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['last_name']}}</td>
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['phone_no']}}</td>
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['alternate_phone']}}</td>
           
            <td style=" padding: 15px 20px; text-align: center;">{{$order_data['email']}}</td>
           
             </tr>
           
            </table>
            </div>
       
            @php $total="0"@endphp
            @foreach ($item_in_cart as $data )

            <table style="margin-top: 10px; box-sizing: border-box; width: 100%; border-collapse:collapse; border-spacing: 0; box-shadow: 0 2px 15px rgba(185, 185, 185, 0.7);  border-radius: 12px;  overflow:hidden;"">

                <tr style=" width: 100%; background-color: #fafafa; font-family: 'Montserrat', sans-serif;">

                <th style=" padding: 15px 20px; text-align: center;  background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
"> Product Image</th>

                <th style=" padding: 15px 20px; text-align: center; background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Product Name</th>

                <th style=" padding: 15px 20px; text-align: center; background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Qty</th>

                <th style=" padding: 15px 20px; text-align: center; background-color: grey; color: #fafafa;font-family: 'Open Sans',Sans-serif; font-weight: 200; font-size: small; text-transform: uppercase;
">Price</th>

                </tr>


                <tr style=" width: 100%; background-color: #fafafa; font-family: 'Montserrat', sans-serif;">


                <td style=" padding: 15px 20px; text-align: center;"><img src="{{ asset('upload/product/'.$data['item_image']) }}"style="width:80px;height:80px;"></td>

                <td style=" padding: 15px 20px; text-align: center;">{{$data['item_name']}}</td>

                <td style=" padding: 15px 20px; text-align: center;">{{$data['item_quantity']}}</td>

                <td style=" padding: 15px 20px; text-align: center;">{{$data['item_price']}}</td>


                
                </tr>

                </table>
                @php $total = $total + ($data['item_quantity']* $data['item_price']) @endphp
                @endforeach


                   <div style="float:right; margin-top:15px; background-color:white; box-shadow: 0 2px 15px rgba(185, 185, 185, 0.7); padding: 20px; border-radius: 12px; font-size: 20px;
">
                  <tr>
                    <td>Grand Total </td>
                    <td>Rs: {{number_format($total, 2)}}</td>
                   </tr>
                </div>







         </div>
 </body>

</html>
