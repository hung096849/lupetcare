<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<script src="{{ asset('frontend/js/onOff.js') }}"></script>
<script src="{{ asset('frontend/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  // paypal.Button.render({
  //   // Configure environment
  //   env: 'sandbox',
  //   client: {
  //     sandbox: 'AWgVbjmbRoRKPCX_tA1s44UzGjGipGI07AMcvz3w9imor-5m-SFDAgpBELYcvhGPcakx8MHB9FV5kjGJ',
  //     production: 'demo_production_client_id'
  //   },
  //   // Customize button (optional)
  //   locale: 'en_US',
  //   style: {
  //     size: 'large',
  //     color: 'gold',
  //     shape: 'pill',
  //   },

  //   // Enable Pay Now checkout flow (optional)
  //   commit: true,

  //   // Set up a payment
  //   payment: function(data, actions) {
  //     return actions.payment.create({
  //       transactions: [{
  //         amount: {
  //           total: '0.01',
  //           currency: 'USD'
  //         }
  //       }]
  //     });
  //   },
  //   // Execute the payment
  //   onAuthorize: function(data, actions) {
  //     return actions.payment.execute().then(function() {
  //       // Show a confirmation message to the buyer
  //       window.alert('Thank you for your purchase!');
  //     });
  //   }
  // }, '#paypal-button');

</script>