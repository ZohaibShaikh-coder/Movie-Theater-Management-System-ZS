<?php include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
} ?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php
include('./form.php');
$frm = new formBuilder;
?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./Credit Card Form/style.css">

    <style>
        .contentcred {

            padding: 20px 20px;

        }

        body {
            background-color: #4b9ad630;
        }

        .card-form__button {
            width: 100%;
            height: 40px;
            background: #4bbdd6;
            border: none;
            border-radius: 5px
            font-size: 21px;
            font-weight: 600;
            font-family: "Source Sans Pro", sans-serif;
            box-shadow: 3px 10px 20px 0px rgba(35, 100, 210, 0.3);
            color: #fff;
            margin-top: 20px;
            cursor: pointer;
            text-shadow: 0 0 2px #000, 0 0 2px #000;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="contentcred" id="app">
        <form action="bank.php" method="post" id="form1">
            <div class="card-form">
                <div class="card-list">
                    <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                        <div class="card-item__side -front">
                            <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }" v-bind:style="focusElementStyle" ref="focusElement"></div>
                            <div class="card-item__cover">
                                <img src="./Credit Card Form/./image/Credit Card Cover BG.jpg" class="card-item__bg">
                            </div>

                            <div class="card-item__wrapper">
                                <div class="card-item__top">
                                    <img src="./Credit Card Form/./image/chip.png" class="card-item__chip">
                                    <div class="card-item__type">
                                        <transition name="slide-fade-up">
                                            <img src="./Credit Card Form/./image/./visa.png " class="card-item__typeImg">
                                        </transition>
                                    </div>
                                </div>
                                <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                    <template v-if="getCardType === 'amex'">
                                        <span v-for="(n, $index) in amexCardMask" :key="$index">
                                            <transition name="slide-fade-up">
                                                <div class="card-item__numberItem" v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''">*</div>
                                                <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" :key="$index" v-else-if="cardNumber.length > $index">
                                                    {{cardNumber[$index]}}
                                                </div>
                                                <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" v-else :key="$index + 1">{{n}}</div>
                                            </transition>
                                        </span>
                                    </template>

                                    <template v-else>
                                        <span v-for="(n, $index) in otherCardMask" :key="$index">
                                            <transition name="slide-fade-up">
                                                <div class="card-item__numberItem" v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">*</div>
                                                <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" :key="$index" v-else-if="cardNumber.length > $index">
                                                    {{cardNumber[$index]}}
                                                </div>
                                                <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }" v-else :key="$index + 1">{{n}}</div>
                                            </transition>
                                        </span>
                                    </template>
                                </label>
                                <div class="card-item__content">
                                    <label for="cardName" class="card-item__info" ref="cardName">
                                        <div class="card-item__holder">Card Holder</div>
                                        <transition name="slide-fade-up">
                                            <div class="card-item__name" v-if="cardName.length" key="1">
                                                <transition-group name="slide-fade-right">
                                                    <span class="card-item__nameItem" v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')" v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                                </transition-group>
                                            </div>
                                            <div class="card-item__name" v-else key="2">Full Name</div>
                                        </transition>
                                    </label>
                                    <div class="card-item__date" ref="cardDate">
                                        <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                                        <label for="cardMonth" class="card-item__dateItem">
                                            <transition name="slide-fade-up">
                                                <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                                                <span v-else key="2">MM</span>
                                            </transition>
                                        </label>
                                        /
                                        <label for="cardYear" class="card-item__dateItem">
                                            <transition name="slide-fade-up">
                                                <span v-if="cardYear" v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
                                                <span v-else key="2">YY</span>
                                            </transition>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-item__side -back">
                            <div class="card-item__cover">
                                <img src="./Credit Card Form/./image/Credit Card Cover BG.jpg" class="card-item__bg">
                            </div>
                            <div class="card-item__band"></div>
                            <div class="card-item__cvv">
                                <div class="card-item__cvvTitle">CVV</div>
                                <div class="card-item__cvvBand">
                                    <span v-for="(n, $index) in cardCvv" :key="$index">
                                        *
                                    </span>

                                </div>
                                <div class="card-item__type">
                                    <img src="./Credit Card Form/./image/./visa.png " class="card-item__typeImg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-form__inner">
                    <div class="card-input">
                        <label for="cardNumber" class="card-input__label">Card Number</label>
                        <input type="text" name="number" id="cardNumber" class="card-input__input" v-mask="generateCardNumberMask" v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber" autocomplete="off">
                    </div>
                    <div class="card-input">
                        <label for="cardName" class="card-input__label">Card Holder</label>
                        <input type="text" name="name" id="cardName" class="card-input__input" v-model="cardName" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardName" autocomplete="off">
                    </div>
                    <div class="card-form__row">
                        <div class="card-form__col">
                            <div class="card-form__group">
                                <label for="cardMonth" name="date" class="card-input__label">Expiration Date</label>
                                <select class="card-input__input -select" id="cardMonth" v-model="cardMonth" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                    <option value="" disabled selected>Month</option>
                                    <option v-bind:value="n < 10 ? '0' + n : n" v-for="n in 12" v-bind:disabled="n < minCardMonth" v-bind:key="n">
                                        {{n < 10 ? '0' + n : n}}
                                    </option>
                                </select>
                                <select class="card-input__input -select" id="cardYear" v-model="cardYear" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                    <option value="" disabled selected>Year</option>
                                    <option v-bind:value="$index + minCardYear" v-for="(n, $index) in 12" v-bind:key="n">
                                        {{$index + minCardYear}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-form__col -cvv">
                            <div class="card-input">
                                <label for="cardCvv" class="card-input__label">CVV</label>
                                <input type="text" name="cvv" class="card-input__input" id="cardCvv" v-mask="'####'" maxlength="3" v-model="cardCvv" v-on:focus="flipCard(true)" v-on:blur="flipCard(false)" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <button class="card-form__button">
                        Make Payment
                    </button>
        </form>
    </div>
    </div>


    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>
    <script src='https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js'></script>
    <script src="./Credit Card Form/script.js"></script>

    <script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
                fields: {
                    name: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Name is required and can\'t be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z ]+$/,
                                message: 'The Name can only consist of alphabets'
                            }
                        }
                    },
                    number: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Card Number is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 16,
                                max: 16,
                                message: 'The Card Number must 16 characters long'
                            },
                            regexp: {
                                regexp: /^[0-9 ]+$/,
                                message: 'Enter a valid Card Number'
                            }
                        }
                    },
                    date: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Expire Date is required and can\'t be empty'
                            }
                        }
                    },
                    cvv: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The cvv is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 3,
                                max: 3,
                                message: 'The cvv must 3 characters long'
                            },
                            regexp: {
                                regexp: /^[0-9 ]+$/,
                                message: 'Enter a valid cvv'
                            }
                        }
                    }
                }
            });
        });
    </script>
    <script>
  <?php $frm->applyvalidations("form1"); ?>
</script>

</body>

</html>


<div class="clear"></div>

</div>
<?php include('footer.php'); ?>
</div>
<?php
extract($_POST);
include('config.php');
$_SESSION['screen'] = $screen;
$_SESSION['seats'] = $seats;
$_SESSION['amount'] = $amount;
$_SESSION['date'] = $date;

?>