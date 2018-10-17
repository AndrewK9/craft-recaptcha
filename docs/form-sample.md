# Sample Form Element

This form is using the [Contact Form](https://github.com/craftcms/contact-form) plugin.

```html
<form class="js-form" method="post" action="" accept-charset="UTF-8" data-key="{{ craft.recaptcha.getPublicKey() }}" data-csrf-token="{{ craft.app.request.csrfToken }}">
    {{ csrfInput() }}    
    <input type="text" name="fromName" id="fromName" value="" placeholder="Name" />
    <input type="email" name="fromEmail" id="fromEmail" value="" placeholder="Email" />
    <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
    
    <input type="submit" value="Send Message" />
</form>
```