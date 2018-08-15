# Sample reCAPTCHA Verification

```javascript
promise.then(()=>{
    grecaptcha.ready(()=>{
        grecaptcha.execute(key, { action: 'type' })
        .then((token) => {
            new Promise((resolve, reject) => {
                $.ajax({
                    type: 'post',
                    cache: false,
                    data: {
                        'token': token,
                        'CRAFT_CSRF_TOKEN': CSRFtoken
                    },
                    url: '/recaptcha/verify',
                    success: (response)=>{ resolve(JSON.parse(response)); },
                    error: (e)=>{ reject(e); }
                });
            })
            .then((response)=>{
                if(response.status === 1){
                    console.log('Use Verified');
                    // handle form ajax
                }
                else console.log(response.message);
            })
            .catch((error)=>{
                console.log('Error:');
                console.log(error);
            });
        });
    });
})
.catch((error)=>{
    console.log('Error:');
    console.log(error);
});
```