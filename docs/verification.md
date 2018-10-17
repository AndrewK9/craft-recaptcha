# Sample reCAPTCHA Verification

```javascript
grecaptcha.ready(()=>{
    grecaptcha.execute(key, { action: 'type' })
    .then((token) => {
        new Promise((resolve, reject) => {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', `index.php/actions/recaptcha/verify/verify-token?token=${token}&CRAFT_CSRF_TOKEN=${csrfToken}`);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onload = resolve;
            xhr.onerror = reject;
            xhr.send();
        })
        .then((response)=>{
            if(response.status === 200){
                console.log('Use Verified');
                // handle form ajax
            }
            else console.log(response.status,' Error: ', response.message);
        })
        .catch((error)=>{
            console.log('Error:', error);
        });
    });
});
```