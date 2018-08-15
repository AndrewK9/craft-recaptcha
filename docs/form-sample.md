# Sample Form Element

This form is using the [Contact Form](https://github.com/craftcms/contact-form) plugin.

```html
<form class="js-form" method="post" action="" accept-charset="UTF-8">
    {{ csrfInput() }}
    <input type="hidden" name="action" value="contact-form/send">
    
    <input type="text" name="fromName" id="fromName" value="" placeholder="Name" />
    <input type="email" name="fromEmail" id="fromEmail" value="" placeholder="Email" />
    <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
    
    <input type="submit" value="Send Message" />
</form>
```