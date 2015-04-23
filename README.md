# mCart
Drop-in shopping session cart class / PHP

## Usage

###Initialize shopping cart
$cart = new mCart('myCart');

### Get cart items
        $cart->getItems();

### Set cart items
        $cart->setItems(array());

### Add item to cart
        $cart->add(array('name' => 'Test Item', 'quantity' => 2, 'price' => '20.32'));
        
### Update item in cart
        $cart->update('key', $item);
        
### Remove item from cart
        $cart->remove('key', 'value');
        
### Check if an item exist in the cart
        $cart->exists('key', 'value');
        
### Destroy the cart
        $cart->destroy();
       
        
                
