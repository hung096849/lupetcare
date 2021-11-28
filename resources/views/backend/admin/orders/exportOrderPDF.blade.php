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
    
                    <img src="{{ asset('frontend/imgs/download-pdf/WaveEvolution_Logo_I_RGB_colour.png') }}" alt="" class="logo mb-3">
        
                    <address>
                            Wave Evolution Pte Ltd
                            16 Raffles Quay
                            #41-07, Hong Leong Building
                            Singapore 048581                    
                    </address>
    
                </aside>
    
                <aside class="col-md-5 px-0">
    
                    <div class="invoice">
                        <h1>
                            Invoice 
                        </h1>
            
                        <div class="d-flex justify-content-between">
            
                            <span>
                                Invoice Code
                            </span>
                            
                            <span id="code">
                                #{{ $order->code }}
                            </span>
            
                        </div>
            
                        <div class="d-flex justify-content-between">
            
                            <span>
                                Issue Date 
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
                        Bill To : {{ $order->customers->first_name }} {{ $order->customers->last_name }}
                    </span>
    
                    <div class="rounded col-md-5 d-flex justify-content-between px-0" style="border:1px solid #1a283d;">
                        <span style="background: #1a283d; color:  white; display: inline-block; padding: 0.2rem 2rem;" >
                            PAID 
                        </span>
                        <span style="display: inline-block;padding: 0.2rem .5rem">
                            {{ number_format($order->total) }} {{ $order->currency == "USD" ? "$" : $order->currency }}
                        </span>
                    </div>                
                </div>
    
                <dl class="mb-5">
    
                    <dd>
                        Wave Evolution Pte Ltd
                    </dd>
    
                    <dd>
                        Travis Saw -
                    </dd>
    
                    <dd>
                        16 Raffles Quay. #41-07,
                    </dd>
    
                    <dd>
                        Hong Leong Building
                    </dd>
    
                    <dd>
                        Singapore, 048581
                    </dd>
    
                    <dd>
                        SG
                    </dd>
    
    
                </dl>
    
                <table class="w-100 mb-5">
    
                    <thead>
                        <tr>
        
                            <th>
                                <h3>
                                    Plan
                                </h3>
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Method
                            </th>
                            <th>
                                Total
                            </th>
        
                        </tr>
                    </thead>
    
                    <tbody>
    
                        <tr>
    
                            <th>
                                {{ $item->name }}
                            </th>
                            <th>
                                {{ $order->credits }} Credits
                            </th>
                            <th>
                                    <img width="100px" src="{{ $order->method == App\Constant\PlanConstant::STRIPE ? asset('/frontend/imgs/home/waveleads_Img/images.png') : asset('/frontend/imgs/home/waveleads_Img/Group 2616.png') }}" alt="">
                            </th>
                           
                            <th>
                                {{ number_format($order->total) }} {{ $order->currency == "USD" ? "$" : $order->currency }}
                            </th>
                            
                        </tr>
    
                        <!-- br between each line -->
                        <tr class="break-line">
                            <td colspan="4">
                                <hr>
                            </td>
                        </tr>
    
                       
                        <!-- br between each line -->
                        <tr class="break-line">
                            <td colspan="3">
                                <hr>
                            </td>
                        </tr>
    
                    </tbody>
                    <tfoot>
    
                        <td colspan="3">
                            <div>
                                <p>
                                    <b>
                                        Billed From:
                                    </b>
                                    Wave Evolution SAS
                                </p>
                            </div>
                        </td>
    
                    </tfoot>
                </table>
    
            </main>
    
            <footer>
    
                <div class="row mx-0 mb-5">
                    <aside class="col-md-7 px-0 pr-4">
                        <div class="info">
                            <p>
                                * All invoice dates listed above reflect a period of midnight to midnight (UTC)
                            </p>
                            <p>
                                Wave Evolution SAS | FR67524536992 | SAS au capital de 78 699,66€ | Siret:
                                524 536 00059 | RCS: Paris B 524 536 992 - APE 6311Z 
                            </p>
                        </div>
                    </aside>
                    <aside class="col-md-5">
    
                        <div class="price">
                            <hr class="mt-0 mb-2">
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="col-8 text-right">
                                    <b>
                                        GRAND TOTAL
                                    </b>
                                </span>
                                <span class="col-4 text-right">
                                    {{ number_format($order->total) }} {{ $order->currency }}
                                </span>
                            </div>
    
                            <hr class="mt-0 mb-2">                        
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="col-8 text-right">
                                    Payments 
                                </span>
                                <span class="col-4 text-right">
                                    {{ number_format($order->total) }} {{ $order->currency }}
                                </span>
                            </div>
                        </div>
                        
                    </aside>
                </div>
    
                <h4 style="font-size: 16px;">
                    Invoice History 
                </h4>
    
                
                    <p style="font-size : 14px;">
                        <b>
                            {{ $order->created_at }}
                        </b>
                        @if($order->method === "STRIPE")
                        Credit card payment: 
                        <span>
                            {{ number_format($order->total) }} VND
                        </span>
                        (Master, XXXX-XXXX-XXXX-XXXX)
                        @endif
                    </p>
               
    
            </footer>
    
        </div>
    </div>
    {{-- {{ asset('frontend/js/js-pdf/html2pdf.bundle.min.js') }} --}}
    <script src="" ></script>
    <script>
        var nameFile = "Billing"+document.getElementById('code').innerText;
        var element = document.getElementById('element-to-print');
        var opt = {
            margin:       1,
            filename:     `${nameFile}.pdf`,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
        html2pdf().set(opt).from(element).save();
    </script>
</body>
</html>