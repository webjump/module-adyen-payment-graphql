#Adyen GrahpQl

## Request Exemple

```graphql
mutation (
  $cartId: String!,
  $paymentMethodCode: String!,
  $creditCardNumer: String!,
  $creditCardCvc: String!,
  $creditCardExpiryMonth: String!,
  $creditCardExpireYear: String!,
  $creaditCardType: String!
) {
  setPaymentMethodOnCart(input: {
      cart_id: $cartId
      payment_method: {
          code: $paymentMethodCode
          adyen_cc: {
            number: $creditCardNumer
            cvc: $creditCardCvc
            expiryMonth: $creditCardExpiryMonth
            expiryYear: $creditCardExpireYear
            cc_type: $creaditCardType
          }
      }
      
  }) {
    cart {
      selected_payment_method {
        code
      }
    }
  }
}
```