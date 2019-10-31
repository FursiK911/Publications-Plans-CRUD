import {MDCTopAppBar} from '@material/top-app-bar';
import {MDCRipple} from '@material/ripple';
import {MDCIconButtonToggle} from '@material/icon-button';
import {MDCTextField} from '@material/textfield';


// Top App Bar and Drawer
const topAppBarElement = document.querySelector('.mdc-top-app-bar');
const topAppBar = new MDCTopAppBar(topAppBarElement);
import {MDCDrawer} from "@material/drawer";
const drawer = MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
topAppBar.setScrollTarget(document.getElementById('main-content'));
topAppBar.listen('MDCTopAppBar:nav', () => {
  drawer.open = !drawer.open;
});

// Buttons
var buttons = document.querySelectorAll('.mdc-button, .mdc-card__primary-action, .mdc-fab, .mdc-icon-button');
for (var i = 0, button; button = buttons[i]; i++) {
    //const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    button.addEventListener("click", function(evt){
        // getting element
        var targetElement = evt.target || evt.srcElement;
        // add to cart
        if(targetElement.hasAttribute("data-id") && targetElement.getAttribute("data-id") == "add_to_cart_btn")
        {
            var product = targetElement.parentNode.parentNode;
            var el2add = {
                pid: product.getAttribute("data-id"),
                code: product.innerHTML,
            }
            console.log(el2add);
            var cart = window.localStorage.getItem('cart');
            if(cart == null)
                cart = [el2add];
            else
            {
                cart = JSON.parse(cart);
                cart.push(el2add);
            }
            window.localStorage.setItem('cart', JSON.stringify(cart));
        }
        //remove from cart
        if(targetElement.hasAttribute("data-id") && targetElement.getAttribute("data-id") == "remove_from_cart_btn")
        {
            var product = targetElement.parentNode.parentNode;
            var el2rem = product.getAttribute("data-id");
            console.log(el2rem);
            var cart = window.localStorage.getItem('cart');
            if(cart == null)
                console.assert(true, "Корзина и так пуста.");
            else
            {
                cart = JSON.parse(cart);
                cart.splice(el2rem, 1);
            }
            window.localStorage.setItem('cart', JSON.stringify(cart));
            window.location.reload();
        }
        //buy for cart
        if(targetElement.hasAttribute("data-id") && targetElement.getAttribute("data-id") == "buy_cart_btn")
        {
            var cart = window.localStorage.getItem('cart');
            if(cart == null || cart == [])
                alert("Корзина пуста.");
            else
            {
                alert("Функция ещё не реализована.");
            }
            window.localStorage.removeItem('cart');
            window.location.reload();
        }
        //clear cart
        if(targetElement.hasAttribute("data-id") && targetElement.getAttribute("data-id") == "clear_cart_btn")
        {
            var cart = window.localStorage.getItem('cart');
            if(cart == null || cart == [])
                alert("Корзина пуста.");
            window.localStorage.removeItem('cart');
            window.location.reload();
        }
    });
    MDCRipple.attachTo(button);
}

// Text Fileds
var textFields = document.querySelectorAll('.mdc-text-field');
for (var i = 0, textField; textField = textFields[i]; i++) {
    //const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
    MDCTextField.attachTo(textField);
}