<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</head>
<body class="antialiased">
<div class="container align-self-center mt-5">
    <div class="row ">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <div class="card">
                <div class="col align-self-center mt-5">
                    <div class='col align-self-center'></div>
                    <div class='col align-self-center'>
                        <form name="payment-form" action="/" class="require-validation" id="payment-form" method="post">

                            <div class='row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Card Holder Name</label>
                                    <input class='form-control' name="card_holder" id="card-holder" value=""  type='text'>
                                    <p class="error name-error text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'> Card Number <span class="text-danger">*</span></label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'> Currency <span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example">

                                    <option selected>Select Currency</option>
                                    <option value="USD">USD</option>
                                    <option value="EURO">EURO</option>
                                    <option value="GBP">GBP</option>
                                </select>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'> Amount <span class="text-danger">*</span></label>
                                    <input class='form-control' type='number' min="1">
                                </div>
                            </div>

                            <br>
                            <div class='row'>
                                <div class='col-md-6 form-group cvc required'>
                                    <label class='control-label'>CVC  <span class="text-danger">*</span></label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-md-6 form-group expiration required'>
                                    <label class='control-label'>Expiration  <span class="text-danger">*</span></label>
                                    <input class='form-control card-expiry-month' placeholder='MM//YYYY' size='6' type='text'>
                                </div>

                            </div>
                            <br>
                            <div class='form-row mb-5'>
                                <div class='col-md-12 form-group'>
                                    <button  id="submit-btn" class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class='col align-self-center'></div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>
