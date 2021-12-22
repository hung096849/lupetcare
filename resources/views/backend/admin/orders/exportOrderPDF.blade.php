<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <title>Billing</title>
    <style>
        body{
            background: black;
        }
        .Mailjet{
            background: white;
            width: 100%;
            max-width: 826px;
        }
        .Mailjet .logo{        
            height: 3rem;        
        }
        .Mailjet .invoice div{              
            font-weight: 500;
            font-size: 14px;
        }
        .Mailjet .invoice h1{
            font-size: 1.6rem;                    
            color: #041f69;  
        }
        .Mailjet main .basic-info{
            font-weight: 500;
        }
        .Mailjet main dl dd{
            margin-bottom: 0.3rem;
            font-weight: 500;
            font-size: 14px;
        }
        .Mailjet main table thead{
            background: #f7f7f7;                
        }   
        .Mailjet main table{
            font-size: 14px;
            border: 1px solid lightgray;
        }

        .Mailjet main table thead tr{
        }
        .Mailjet main table thead th {
            padding: 1.5rem;
            font-weight: 500;                  
            vertical-align: baseline;
        }
        .Mailjet main table tr td, .Mailjet main table tr th {
        page-break-inside: avoid;
        }
        .Mailjet main table thead th h3{
            font-size: 14px;
        }
        
        .Mailjet main table thead th span{
            color: gray;
            font-weight: 400;
        }
        .Mailjet main table tbody th {
            padding: 1.5rem;
            color: gray;
            font-weight: 400;
        }
        .Mailjet main table tbody hr{
            margin: 0;
        }
        .Mailjet main table tbody td {
            padding: 1.5rem;                 
            vertical-align: baseline;
        }
        
        .Mailjet main table tbody .break-line td {
            padding-top: 0;
            padding-bottom: 0;       
        }

        .Mailjet main table tbody td h3,.Mailjet main table tbody span{
            font-size: 14px;
            font-weight: 500;
        }
        .Mailjet main table tfoot div{
            padding: 1.5rem 1.5rem;
        }        
        .Mailjet main table tfoot div p{
            background: #f7f7f7;
            padding: 1.5rem;
            color: #354f93;
            width: fit-content;
            min-width: 50%;
        }
        .Mailjet footer .info{
            font-size: 13px;
            font-weight: 500;
            color: #4d589e;
        }
        .Mailjet footer .price{
            font-size: 13px;
            font-weight: 500;
        }
        
        .Mailjet footer .price span:first-child{
            font-weight: 700;
        }
        .container_print{
            background: white;
            margin: auto;
            max-width: 826px;
            padding: 50px;
            margin-top:50px;
        }
    </style>
</head>
<body >
    <div class='container_print'>
        <div class="Mailjet mx-auto" id="element-to-print">
    
            <header class="row mx-0 mb-5">
    
                <aside class="col-md-7 px-0 mx-0 pr-md-4">
    
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="logo mb-3">
        
                    <address>
                        LupetCare <br>
                        Địa Chỉ: Số 1 Trịnh Văn Bô , Nam Từ Liêm , Hà Nội
                        1900 1088          
                    </address>
    
                </aside>
    
                <aside class="col-md-5 px-0">
    
                    <div class="invoice">
                        <h1>
                            Invoice 
                        </h1>
                        <div class="d-flex justify-content-between">
                            <span>
                                Mã hóa đơn
                            </span>
                            
                            <span id="code">
                                 # <b>{{ $order->order_code }}</b>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
            
                            <span>
                                Ngày tạo hóa đơn :
                            </span>
                            
                            <span>
                                 {{ date('d-m-Y', strtotime($order->created_at)) }}
                            </span>
                            
                        </div>
            
                    </div>
    
                </aside>
            </header>
            <main>
    
                <div class="basic-info d-flex justify-content-between mb-3">
                    <span>
                        Hóa đơn của :
                        {{ $order->customer->name }}
                    </span>
    
                    <div class="rounded col-md-5 d-flex justify-content-between px-0" style="border:1px solid #1a283d;">
                        <span style="background: #1a283d; color:  white; display: inline-block; padding: 0.2rem 2rem;" >
                            Thanh toán :
                        </span>
                        <span style="display: inline-block;padding: 0.2rem .5rem">
                            {{--  {{ $order->currency == "USD" ? "$" : $order->currency }} --}}
                            {{ number_format($order->total_price - $order->pile) }} VNĐ
                        </span>
                    </div>                
                </div>

                <table class="w-100 mb-5">
    
                    <thead>
                        <tr>
        
                            <th>
                                <h3>
                                    Tên pet thú cưng
                                </h3>
                            </th>
                            <th>
                                <h3>
                                    Mã thú cưng
                                </h3>
                            </th>
                            <th>
                                Dịch vụ
                            </th>
                            <th>
                                Đơn giá
                            </th>
                            <th>
                                Cân nặng
                            </th>
                            <th>
                                Giá theo cân nặng
                            </th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($orderPet as $item)
                        <tr>
                            <th>
                                {{ $item->petInformation->name }} 
                            </th>
                            <th>
                                {{ $item->petInformation->code }} 
                            </th>
                            <th>
                                {{ $item->petServices->service_name }} 
                            </th>
                           
                            <th>
                                {{ number_format($item->petServices->price) }} VNĐ
                            </th>
                            <th>
                                @php
                                    $weight = "";
                                    foreach (Config::get('dataWeight.WEIGHT') as $key => $value) {
                                        if($item->quantity === $key) $weight = $value;
                                    }
                                @endphp
                                {{ $weight }}
                            </th>
                            <th>
                                {{ number_format($item->petServices->price*$item->quantity) }} VNĐ
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p>Tiền cọc : <b>{{ isset($order->pile) ? number_format($order->pile) : 0 }}</b></p>
                        </div>
                        <div>
                            <p>Tổng tiền dịch vụ : <b>{{ isset($order->total_price) ? number_format($order->total_price) : 0 }}</b></p>
                        </div>
                        <div>
                            <p>Tổng tiền cần thanh toán : <b>{{ isset($order->pile) ? number_format($order->total_price - $order->pile) : 0 }}</b></p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="{{ asset('frontend/js/js-pdf/html2pdf.bundle.min.js') }}"></script>
    <script>
        // var nameFile = "Mã hóa đơn : "+document.getElementById('code').innerText;
        // var element = document.getElementById('element-to-print');
        // var opt = {
        //     margin:       1,
        //     filename:     `${nameFile}.pdf`,
        //     image:        { type: 'jpeg', quality: 0.98 },
        //     html2canvas:  { scale: 2 },
        //     jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        //     };
        // html2pdf().set(opt).from(element).save();
    </script>
</body>
</html>