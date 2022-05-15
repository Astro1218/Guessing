@extends('layouts.app')
@section('content')
    <style>
        input {
            padding: 8px;
        }

        button.submit {
            height: 45px;
        }

        .present-container, .payment-container {
            display: flex;
            flex-direction: row;
        }

        .present-container>button, .payment-container>button {
            flex: 1;
        }

        .present-container>input, .payment-container>input {
            margin-right: 8px;
            flex: 3;
        }
        .hide {
            display: none;
        }
    </style>

    <div>
        <div class="alert alert-danger hide">
        </div>


        <h2>Charge</h2>
        <div class="alert alert-info">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </div>
        <form action="{{ url('/present') }}" method="post">
            @csrf
            <div class="form-group payment-container">
                <input type="text" name="credit_card" placeholder="Credit Card">
                <input type="text" name="amount" placeholder="Amount">
                <button class="btn btn-info submit">Submit</button>
            </div>
        </form>

        <h2>Present</h2>
        <div class="alert alert-info">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </div>
        <form action="{{ url('/present') }}" method="post" name="present_form">
            @csrf
            <div class="form-group present-container">
                <input type="text" name="present" placeholder="Present number">
                <button class="btn btn-info submit">Submit</button>
            </div>
        </form>
    </div>

    @include('layouts.assets')

    <script>
        $(function() {
            var alert_close = '<button type="button" class="close" data-dismiss="alert">×</button>';

            document.present_form.onsubmit = function() {
                var present = document.present_form.present.value;

                if (present == '') {
                    $('.alert-danger').html(alert_close + " Please input present number.").show();
                    return false;
                }

                return true;
            }
        })
    </script>
@endsection
