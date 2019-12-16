<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel = { 
    csrfToken: '{{ csrf_token() }}',
     }</script>

    <title>Crm - Admin</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/invoice.css') }}">

</head>
<body>
  <section class="card">
    <div id="invoice-template" class="card-body">
      <!-- Invoice Company Details -->
      <div id="invoice-company-details" class="row">
        <div class="col-md-6 col-sm-12 text-center text-md-left">
          <div class="media">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA+lpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAxNy0wNS0yMlQxMjoyNjo0OSswNTozMCIgeG1wOk1vZGlmeURhdGU9IjIwMTctMDUtMjZUMDY6Mjc6MzMrMDU6MzAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMTctMDUtMjZUMDY6Mjc6MzMrMDU6MzAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkJFQ0NCRUUyM0EwMDExRTdBRTUwOEI5RUFFMUJEREYxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkJFQ0NCRUUzM0EwMDExRTdBRTUwOEI5RUFFMUJEREYxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVm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" alt="company logo" class="">
            <div class="media-body">
              <ul class="ml-4 px-0 list-unstyled">
                <li class="text-bold-800">Stack Creative Studio</li>
                <li>4025 Oak Avenue,</li>
                <li>Melbourne,</li>
                <li>Florida 32940,</li>
                <li>USA</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right">
          <h2>INVOICE</h2>
          <p class="pb-3"># INV-001001</p>
          <ul class="px-0 list-unstyled">
            <li>Balance Due</li>
            <li class="lead text-bold-800">$ 12,000.00</li>
          </ul>
        </div>
      </div>
      <!--/ Invoice Company Details -->
      <!-- Invoice Customer Details -->
      <div id="invoice-customer-details" class="row pt-2">
        <div class="col-sm-12 text-center text-md-left">
          <p class="text-muted">Bill To</p>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-left">
          <ul class="px-0 list-unstyled">
            <li class="text-bold-800">Mr. Bret Lezama</li>
            <li>4879 Westfall Avenue,</li>
            <li>Albuquerque,</li>
            <li>New Mexico-87102.</li>
          </ul>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right">
          <p>
            <span class="text-muted">Invoice Date :</span> 06/05/2016</p>
          <p>
            <span class="text-muted">Terms :</span> Due on Receipt</p>
          <p>
            <span class="text-muted">Due Date :</span> 10/05/2016</p>
        </div>
      </div>
      <!--/ Invoice Customer Details -->
      <!-- Invoice Items Details -->
      <div id="invoice-items-details" class="pt-2">
        <div class="row">
          <div class="table-responsive col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item &amp; Description</th>
                  <th class="text-right">Rate</th>
                  <th class="text-right">Hours</th>
                  <th class="text-right">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <p>Create PSD for mobile APP</p>
                    <p class="text-muted">Simply dummy text of the printing and typesetting industry.</p>
                  </td>
                  <td class="text-right">$ 20.00/hr</td>
                  <td class="text-right">120</td>
                  <td class="text-right">$ 2400.00</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>
                    <p>iOS Application Development</p>
                    <p class="text-muted">Pellentesque maximus feugiat lorem at cursus.</p>
                  </td>
                  <td class="text-right">$ 25.00/hr</td>
                  <td class="text-right">260</td>
                  <td class="text-right">$ 6500.00</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>
                    <p>WordPress Template Development</p>
                    <p class="text-muted">Vestibulum euismod est eu elit convallis.</p>
                  </td>
                  <td class="text-right">$ 20.00/hr</td>
                  <td class="text-right">300</td>
                  <td class="text-right">$ 6000.00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 col-sm-12 text-center text-md-left">
            <p class="lead">Payment Methods:</p>
            <div class="row">
              <div class="col-md-8">
                <table class="table table-borderless table-sm">
                  <tbody>
                    <tr>
                      <td>Bank name:</td>
                      <td class="text-right">ABC Bank, USA</td>
                    </tr>
                    <tr>
                      <td>Acc name:</td>
                      <td class="text-right">Amanda Orton</td>
                    </tr>
                    <tr>
                      <td>IBAN:</td>
                      <td class="text-right">FGS165461646546AA</td>
                    </tr>
                    <tr>
                      <td>SWIFT code:</td>
                      <td class="text-right">BTNPP34</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-12">
            <p class="lead">Total due</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Sub Total</td>
                    <td class="text-right">$ 14,900.00</td>
                  </tr>
                  <tr>
                    <td>TAX (12%)</td>
                    <td class="text-right">$ 1,788.00</td>
                  </tr>
                  <tr>
                    <td class="text-bold-800">Total</td>
                    <td class="text-bold-800 text-right"> $ 16,688.00</td>
                  </tr>
                  <tr>
                    <td>Payment Made</td>
                    <td class="pink text-right">(-) $ 4,688.00</td>
                  </tr>
                  <tr class="bg-grey bg-lighten-4">
                    <td class="text-bold-800">Balance Due</td>
                    <td class="text-bold-800 text-right">$ 12,000.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-center">
              <p>Authorized person</p>
              <img src="data:image/png;base64,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" alt="signature" class="height-100">
              <h6>Bicky Raj Kayastha</h6>
              <p class="text-muted">Managing Director</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Invoice Footer -->
      <div id="invoice-footer">
        <div class="row">
          <div class="col-md-7 col-sm-12">
            <h6>Terms &amp; Condition</h6>
            <p>You know, being a test pilot isn't always the healthiest business
              in the world. We predict too much for the next year and yet far
              too little for the next 10.</p>
          </div>
          <!-- <div class="col-md-5 col-sm-12 text-center">
            <button type="button" class="btn btn-primary btn-lg my-1"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>
          </div> -->
        </div>
      </div>
      <!--/ Invoice Footer -->
    </div>
  </section>
</body>
</html>