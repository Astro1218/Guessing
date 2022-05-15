@extends('layouts.app')
@section('content')
    <style>
        .title-word {
            animation: color-animation 4s linear infinite;
        }

        .title-word-1 {
            --color-1: #DF8453;
            --color-2: #3D8DAE;
            --color-3: #E4A9A8;
        }

        .title-word-2 {
            --color-1: #DBAD4A;
            --color-2: #ACCFCB;
            --color-3: #17494D;
        }

        .title-word-3 {
            --color-1: #ACCFCB;
            --color-2: #E4A9A8;
            --color-3: #ACCFCB;
        }

        @keyframes color-animation {
            0% {
                color: var(--color-1)
            }

            32% {
                color: var(--color-1)
            }

            33% {
                color: var(--color-2)
            }

            65% {
                color: var(--color-2)
            }

            66% {
                color: var(--color-3)
            }

            99% {
                color: var(--color-3)
            }

            100% {
                color: var(--color-1)
            }
        }

        /* Here are just some visual styles. 🖌 */

        .title-container {
            display: grid;
            place-items: center;
            text-align: center;
            /* height: 100vh */
        }

        .title {
            font-family: "Montserrat", sans-serif;
            /* font-weight: 800; */
            /* font-size: 8.5vw; */
            text-transform: uppercase;
        }

        .input-container {
            display: flex;
            flex-direction: row;
        }

        input {
            padding: 8px;
            width: 100%;
            text-align: center;
            /* height: 250px; */
            font-size: 100px;
            font-size: 5vw;
        }

        .p0 {
            padding: 0px;
        }

        .mt8 {
            margin-top: 8px;
        }

        .width-100 {
            width: 100%;
        }

        .hide {
            display: none;
        }
    </style>
    <div>
        <div class="alert alert-info">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.

            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </div>

        <div class="title-container">
            <h2 class="title">
                <span class="title-word title-word-1">Guess</span>
                <span class="title-word title-word-2">Correct</span>
                <span class="title-word title-word-3">Word</span>
            </h2>
        </div>

        <div class="alert alert-danger hide">
        </div>

        <form method="post" name="guess_form" action="{{ url('/guess') }}">
            @csrf
            <div class="input-container">
                <input maxlength="1" type="text" class="guess">
                <input maxlength="1" type="text" class="guess">
                <input maxlength="1" type="text" class="guess">
                <input maxlength="1" type="text" class="guess">
                <input maxlength="1" type="text" class="guess">
            </div>
            <input type="hidden" class="guess_word" name="guess_word">
            <div class="col-sm-12 col-md-offset-9 col-md-3 pull-right p0 mt8">
                <button class="btn btn-danger width-100" id="submit" style="height: 50px;"> Submit </button>
            </div>
        </form>
    </div>

    @include("layouts.assets")

    <script>
        $(function() {
            var alert_close = '<button type="button" class="close" data-dismiss="alert">×</button>';

            (function () {
                $('input').css('height', $('input').css("width"));
            })()

            $(window).resize(function() {
                $('input').css('height', $('input').css("width"));
            })

            document.guess_form.onsubmit = function () {
                var guess = [];
                $('.input-container').find('input').each(function() {
                    if ($(this).val() == "") {
                        $('.alert-danger').html(alert_close + " Please input all.").show();

                        $(this).focus();
                        return false;
                    } else {
                        guess.push($(this).val());
                    }
                })

                $('.guess_word').val(guess.join(''));

                if (guess.length != 5) return false;

                return true;
            }

        })
    </script>
@endsection
