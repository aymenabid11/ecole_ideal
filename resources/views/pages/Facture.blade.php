@include('includes.header')

<style>
    body{
        margin-top:20px;
        background:#eee;
    }

    img{
        width:20%;
        height: 80%
    }

    .invoice {
        background: #fff;
        padding: 20px
    }

    .invoice-company {
        font-size: 20px
    }

    .invoice-header {
        margin: 0 -20px;
        background: #f0f3f4;
        padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #2d353c;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 300
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }
    @media print {
    .btn, strong{
        display:none;
    }
    }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listes des Payements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Payement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="col-md-12">
                <div class="invoice">
                    <!-- begin invoice-company -->
                    <div class="invoice-company text-inverse f-w-600">
                        <span class="pull-right hidden-print">
                        <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                        </span>
                        <img src="images/logo.png">
                    </div>
                    <!-- end invoice-company -->
                    <!-- begin invoice-header -->
                    <div class="invoice-header">
                        <div class="invoice-from">
                        <small>De</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Ecole Ideal Pro</strong><br>
                            Rue Abdelkader Chakroune<br>
                            Korba, 8070<br>
                            72385109 <br>
                            96073630
                        </address>
                        </div>
                        <div class="invoice-to">
                        <small>à</small>
                        <address class="m-t-5 m-b-5">
                            @foreach($Etudiants as $Etudiant)
                            <strong class="text-inverse">{{$Etudiant->nom}} {{$Etudiant->prenom}}</strong><br>
                            {{$Etudiant->adresse}}<br>
                            {{$Etudiant->ville}}, {{$Etudiant->code_postale}}<br>
                            Telephone: {{$Etudiant->numero_telephone}}<br>
                            @endforeach
                        </address>
                        </div>
                        @foreach($Etudiants as $Etudiant)
                        <div class="invoice-date">
                        <small>Facture</small>
                        <div class="date text-inverse m-t-5">@php echo date('Y-m-d') @endphp</div>
                        <div class="invoice-detail">
                            #{{$Etudiant->code}}<br>
                            {{$Etudiant->Formation->nom_formation}}
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- end invoice-header -->
                    <!-- begin invoice-content -->
                    <div class="invoice-content">
                        <!-- begin table-responsive -->
                        <div class="table-responsive">
                        <table class="table table-invoice" border=1>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-left" width="40%">Date</th>
                                    <th class="text-center" width="20%">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Payements as $Payement)
                                <tr>
                                    @if(($Payement->num_tranche != 0)&&($Payement->num_tranche != 12))
                                    <td>Tranche N°{{$Payement->num_tranche}}</td>
                                    <td class="text-left">{{$Payement->created_at}}</td>
                                    <td class="text-center">{{$Payement->montant}} DT</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- end table-responsive -->
                        <!-- begin invoice-price -->
                        
                        <div class="invoice-price">
                            <div class="invoice-price-left">
                                <div class="invoice-price-row">
                                @foreach($Payements as $Payement)
                                    <div class="sub-price">
                                        <small>
                                            @if($Payement->num_tranche == 0)
                                                <p>Frais Inscription</p>
                                            @endif
                                        </small>
                                        <span class="text-inverse">
                                            @if($Payement->num_tranche == 0)
                                                {{$Payement->montant}}DT
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                                    <div class="sub-price">
                                        <i class="fa fa-plus text-muted"></i>
                                    </div>
                                @foreach($Payements as $Payement)
                                    <div class="sub-price">
                                        <small>
                                            @if($Payement->num_tranche == 12)
                                                <p>Frais Examan finale</p>
                                            @endif
                                        </small>
                                        <span class="text-inverse">
                                            @if($Payement->num_tranche == 12)
                                                {{$Payement->montant}}DT
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        
                        <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
                        </div>
                        </div>
                        <!-- end invoice-price -->
                    </div>
                    <!-- end invoice-content -->
                    <!-- begin invoice-note -->
                    <div class="invoice-note">
                        * Make all cheques payable to [Your Company Name]<br>
                        * Payment is due within 30 days<br>
                        * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                    </div>
                    <!-- end invoice-note -->
                    <!-- begin invoice-footer -->
                    <div class="invoice-footer">
                        <p class="text-center m-b-5 f-w-600">
                        THANK YOU FOR YOUR BUSINESS
                        </p>
                        <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                        </p>
                    </div>
                    <!-- end invoice-footer -->
                </div>
            </div>
            </div>
      </div>
    </div>

@include('includes.footer')