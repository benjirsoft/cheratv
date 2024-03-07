<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <!-- Title Page-->
    <title>Subscriber Request Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    


    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
    <style>
        .button{
          background-color: green;
          color: white;
          padding: 15px 40px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          text-decoration:none;
          margin-left:20px;
}
    </style>
    
</head>

<body>
    <div class="page-wrapper p-b-50 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    @if (session('success'))
                      <div class="alert-success">
                          {{ session('success') }}
                      </div>
                    @endif
                    @if ($errors->any())
                          <div class="alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    <h2 class="title">Subscriber Request</h2>
                    <form action="{{ route('fryingubscriber') }}" method="get">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input size="20" class="input--style-4" type="text" name="name">
                                </div>
                            </div>
                        
                            <div class="input-group">
                                <label class="label">Phone Number(bKash No)</label>
                                    <input size="20" class="input--style-4" type="text" name="mobileno">
                                
                            </div>
                        </div>    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input size="20" class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Refer ID(Optional)</label>
                                @if(request()->get('ref'))    
                                <input size="20" class="input--style-4" type="text" readonly value="{{ request('ref') ?? null}}" name="referid">
                                @else
                                <input size="20" class="input--style-4" type="text" name="referid">
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="input-group">
                                <label class="label">Package ID</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="packages_id"  id="selectOption">
                                        <option value="" style="display: none" selected>Select Package</option>
                                          <option value="1">1Year-Regular-365 BDT</option>
                                          <option value="2">1Year-Free-0.00 BDT</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label id="label" class="label">Sender bKash No</label>
                                        <input  size="20" id="transactionNumber" class="input--style-4" type="text" name="sendernumber">
                                    </div>
                                </div>
                            <div class="p-t-15">
                                <button type="submit" id="submitButton" class="btn btn--radius-2 btn--blue">Pay With bKash</button>
                                <br>
                                <br>
                                <a style="float:left" class="button" href="{{ route('login')}}">Login</a>
                            </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <a style="float:left" href="/">Go To Website</a>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        <!-- Main JS-->
        <script src="js/global.js"></script>
        <script>
            $(document).ready(function() {
              // Handle button click
              $("#selectOption").on("change", function() {
                var selectedValue = $("#selectOption").val();
                var submitButton = $("#submitButton");
                var textInput = $("#transactionNumber");
                var label = $("#label");
            
                if (selectedValue === "2") {
                  submitButton.text("Submit");
                  submitButton.css("background-color", "#ff0000");
                  textInput.hide();
                  label.hide();
                } else {
                  submitButton.text("Pay With bKash");
                  textInput.show();
                  label.show();
                }
              });
            });
        </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->