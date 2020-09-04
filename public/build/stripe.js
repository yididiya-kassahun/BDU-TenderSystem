Stripe.setPublishableKey('pk_test_51HJFojKkeybiKlO84EyN3LRqsssEUDaY0mUC4GGefTpkPREF1V6CicVlEPWvmMJIuELxcn5SNbbSPTs4BgA8i8vH00VbG383HG');

//var stripe = Stripe('pk_test_51HJFojKkeybiKlO84EyN3LRqsssEUDaY0mUC4GGefTpkPREF1V6CicVlEPWvmMJIuELxcn5SNbbSPTs4BgA8i8vH00VbG383HG');
//var elements = stripe.elements();
var $form = $('#checkout-form');
$form.submit(function(event){
        $('#charge-error').addClass('hidden');
        $form.find('button').prop('disable',true);
    Stripe.card.createToken({
        name: $('#cardholder-name').val(),
        email: $('#email').val(),
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
    }, stripeResponseHandler);
    return false;

});

function stripeResponseHandler(status, response){
    if(response.error){
        $('#charge-error').reomveClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disable',false);
    }else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));

        $form.get(0).submit();
    }
}

