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

</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:py-8">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-5">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <h6>Payment Through Adyen</h6>
                            </div>
                            <hr>
                            <form action="{{route('api.payment')}}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-1">
                                        <label class="form-label" for="formControlLgXc">Card Number</label>
                                        <input type="text" name="card_number" id="formControlLgXc" placeholder="4111 1111 4555 1142" class="form-control form-control-lg" value=""/>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-1">
                                        <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
                                        <input type="text" name="card_holder" id="formControlLgXsd" class="form-control form-control-lg"  placeholder="Dip Ghosh" value=""/>

                                    </div>

                                    <div class="col-md-6 mb-4 pb-1">
                                        <div class="form-outline">
                                            <label class="form-label" for="formControlLgExpk">Expire</label>
                                            <input name="expire" type="password" id="formControlLgExpk"
                                                   class="form-control form-control-lg" value=""
                                                   placeholder="MM/YYYY"/>

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-1">
                                        <div class="form-outline">
                                            <label class="form-label" for="formControlLgcvv">CVV</label>
                                            <input  name="cvv" type="password" id="formControlLgcvv"  value=""
                                                    class="form-control form-control-lg"
                                                    placeholder="737"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary ">Pay Now</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


</body>
</html>
